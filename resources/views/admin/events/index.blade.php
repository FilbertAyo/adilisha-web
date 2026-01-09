<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Events Management</h5>
                    <p class="text-muted mb-0">Manage events and global challenges displayed on the website</p>
                </div>
                <a href="{{ route('admin.resources.events.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Create New Event
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="eventsTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Visibility</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($events as $event)
                                    <tr>
                                        <td>
                                            @if($event->image)
                                                <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" 
                                                     style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="max-width: 250px;">
                                                <strong>{{ $event->name }}</strong>
                                                <br><small class="text-muted">
                                                    <i class="ti ti-user"></i> {{ $event->organizer ?? 'Adilisha' }}
                                                </small>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{ $event->event_date->format('M d, Y') }}
                                                <br><small class="text-muted">{{ $event->event_date->format('h:i A') }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <small>{{ $event->location }}</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($event->type) }}</span>
                                            @if($event->source === 'external')
                                                <br><small class="badge bg-secondary mt-1">External</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($event->status === 'open')
                                                <span class="badge bg-success">Open</span>
                                            @elseif($event->status === 'closed')
                                                <span class="badge bg-danger">Closed</span>
                                            @else
                                                <span class="badge bg-warning">Upcoming</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.resources.events.toggle-visibility', $event) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm {{ $event->is_visible ? 'btn-success' : 'btn-secondary' }}">
                                                    <i class="ti ti-{{ $event->is_visible ? 'eye' : 'eye-off' }}"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.resources.events.show', $event) }}" class="btn btn-sm btn-success" title="View">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.resources.events.edit', $event) }}" class="btn btn-sm btn-info" title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDelete({{ $event->id }}, '{{ addslashes($event->name) }}')"
                                                    title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No events found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Event Modal -->
    <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteEventModalLabel">Delete Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteEventForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong id="delete_event_title"></strong>?</p>
                        <p class="text-danger mb-0">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(id, title) {
            document.getElementById('delete_event_title').textContent = title;
            document.getElementById('deleteEventForm').action = `/admin/resources/events/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('deleteEventModal'));
            modal.show();
        }
    </script>
    @endpush
</x-app-layout>

