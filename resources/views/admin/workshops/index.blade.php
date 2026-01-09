<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Workshop Management</h5>
                    <p class="text-muted mb-0">Manage workshops and their details</p>
                </div>
                <a href="{{ route('admin.workshops.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Create New Workshop
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Filters -->
            <div class="card mb-3">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.workshops.index') }}" class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label small">Search</label>
                            <input type="text" name="search" class="form-control" placeholder="Search workshops..." 
                                   value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Status</label>
                            <select name="status" class="form-select">
                                <option value="">All Status</option>
                                <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">From Date</label>
                            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">To Date</label>
                            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">&nbsp;</label>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="ti ti-search"></i> Filter
                                </button>
                                <a href="{{ route('admin.workshops.index') }}" class="btn btn-secondary">
                                    <i class="ti ti-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="workshopsTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Date & Location</th>
                                    <th>Participants</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($workshops as $workshop)
                                    <tr>
                                        <td>
                                            @if($workshop->main_image)
                                                <img src="{{ asset('storage/' . $workshop->main_image) }}" alt="{{ $workshop->title }}" 
                                                     style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="max-width: 300px;">
                                                <strong>{{ $workshop->title }}</strong>
                                                @if($workshop->tags->count() > 0)
                                                    <br>
                                                    @foreach($workshop->tags as $tag)
                                                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <i class="ti ti-calendar"></i> {{ $workshop->formatted_date }}<br>
                                            <i class="ti ti-clock"></i> {{ $workshop->formatted_time_range }}<br>
                                            <i class="ti ti-map-pin"></i> {{ $workshop->location }}
                                        </td>
                                        <td>
                                            <strong>{{ $workshop->total_participants }}</strong> Total<br>
                                            <span class="text-success">{{ $workshop->girls_participation }} Girls ({{ $workshop->girls_participation_percentage }}%)</span><br>
                                            <small class="text-muted">{{ $workshop->schools_represented }} Schools</small>
                                        </td>
                                        <td>
                                            <span class="badge {{ $workshop->status_badge_class }}">
                                                {{ ucfirst($workshop->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" 
                                                       data-workshop-id="{{ $workshop->id }}"
                                                       {{ $workshop->is_active ? 'checked' : '' }}
                                                       onchange="toggleActive({{ $workshop->id }})">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.workshops.edit', $workshop) }}" class="btn btn-sm btn-info" title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDelete({{ $workshop->id }}, '{{ addslashes($workshop->title) }}')"
                                                    title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No workshops found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $workshops->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Workshop Modal -->
    <div class="modal fade" id="deleteWorkshopModal" tabindex="-1" aria-labelledby="deleteWorkshopModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteWorkshopModalLabel">Delete Workshop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteWorkshopForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong id="delete_workshop_title"></strong>?</p>
                        <p class="text-danger mb-0">This action will also delete all related galleries, testimonials, and beneficiaries. This cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Workshop</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(id, title) {
            document.getElementById('delete_workshop_title').textContent = title;
            document.getElementById('deleteWorkshopForm').action = `/admin/workshops/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('deleteWorkshopModal'));
            modal.show();
        }

        function toggleActive(id) {
            fetch(`/admin/workshops/${id}/toggle-active`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-success alert-dismissible fade show';
                    alertDiv.innerHTML = `
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    document.querySelector('.col-md-12').insertBefore(alertDiv, document.querySelector('.card'));
                    
                    setTimeout(() => alertDiv.remove(), 3000);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
    @endpush
</x-app-layout>

