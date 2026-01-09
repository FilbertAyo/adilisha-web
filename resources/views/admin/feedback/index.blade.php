<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Feedback Management</h5>
                    <p class="text-muted mb-0">Manage beneficiary feedback submissions</p>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="feedbackTable">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>From</th>
                                    <th>Position</th>
                                    <th>Rating</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($feedbacks as $feedback)
                                    <tr class="{{ $feedback->active ? '' : 'table-secondary' }}">
                                        <td>
                                            <input type="number" 
                                                   class="form-control form-control-sm order-input" 
                                                   value="{{ $feedback->order }}" 
                                                   data-id="{{ $feedback->id }}"
                                                   style="width: 70px;"
                                                   min="0">
                                        </td>
                                        <td>{{ $feedback->name }}</td>
                                        <td>{{ $feedback->email }}</td>
                                        <td>{{ $feedback->from ?? 'N/A' }}</td>
                                        <td>{{ $feedback->position ?? 'N/A' }}</td>
                                        <td>
                                            @for($i = 0; $i < $feedback->rating; $i++)
                                                ★
                                            @endfor
                                            ({{ $feedback->rating }}/5)
                                        </td>
                                        <td>
                                            <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" 
                                                 title="{{ $feedback->message }}">
                                                {{ \Illuminate\Support\Str::limit($feedback->message, 100) }}
                                            </div>
                                        </td>
                                        <td>
                                            @if($feedback->active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $feedback->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" 
                                                        class="btn btn-sm {{ $feedback->active ? 'btn-warning' : 'btn-success' }}" 
                                                        onclick="toggleActive({{ $feedback->id }})"
                                                        title="{{ $feedback->active ? 'Deactivate' : 'Activate' }}">
                                                    <i class="ti ti-{{ $feedback->active ? 'eye-off' : 'eye' }}"></i>
                                                </button>
                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        onclick="confirmDelete({{ $feedback->id }}, '{{ $feedback->name }}')"
                                                        title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No feedback submissions found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Feedback Modal -->
    <div class="modal fade" id="deleteFeedbackModal" tabindex="-1" aria-labelledby="deleteFeedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteFeedbackModalLabel">Delete Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete feedback from <strong id="deleteFeedbackName"></strong>? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let deleteFeedbackId = null;

        function toggleActive(feedbackId) {
            fetch(`{{ url('admin/feedback') }}/${feedbackId}/toggle-active`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to update feedback'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating feedback');
            });
        }

        function confirmDelete(feedbackId, name) {
            deleteFeedbackId = feedbackId;
            document.getElementById('deleteFeedbackName').textContent = name;
            const modal = new bootstrap.Modal(document.getElementById('deleteFeedbackModal'));
            modal.show();
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (!deleteFeedbackId) return;

            fetch(`{{ url('admin/feedback') }}/${deleteFeedbackId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to delete feedback'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting feedback');
            });
        });

        // Handle order updates with debounce
        let orderUpdateTimeout = null;
        document.querySelectorAll('.order-input').forEach(input => {
            input.addEventListener('change', function() {
                const feedbackId = this.getAttribute('data-id');
                const order = this.value;

                clearTimeout(orderUpdateTimeout);
                orderUpdateTimeout = setTimeout(() => {
                    fetch(`{{ url('admin/feedback') }}/${feedbackId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify({ order: parseInt(order) })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Optionally show a success message or reload
                            location.reload();
                        } else {
                            alert('Error: ' + (data.message || 'Failed to update order'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while updating order');
                    });
                }, 500);
            });
        });
    </script>
    @endpush
</x-app-layout>

