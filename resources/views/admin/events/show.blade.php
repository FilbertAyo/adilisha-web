<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 offset-xl-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Event Details</h5>
                    <p class="text-muted mb-0">View complete event information</p>
                </div>
                <div class="btn-group">
                    <a href="{{ route('admin.resources.events.edit', $event) }}" class="btn btn-info">
                        <i class="ti ti-edit me-1"></i> Edit
                    </a>
                    <a href="{{ route('admin.resources.events.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i> Back
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @if($event->image)
                        <div class="mb-4">
                            <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" 
                                 class="img-fluid rounded" style="max-height: 400px; width: 100%; object-fit: cover;">
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-3">{{ $event->name }}</h3>
                            
                            <div class="mb-3">
                                <span class="badge bg-info me-2">{{ ucfirst($event->type) }}</span>
                                <span class="badge bg-{{ $event->source === 'internal' ? 'primary' : 'secondary' }} me-2">
                                    {{ ucfirst($event->source) }}
                                </span>
                                @if($event->status === 'open')
                                    <span class="badge bg-success">Registration Open</span>
                                @elseif($event->status === 'closed')
                                    <span class="badge bg-danger">Registration Closed</span>
                                @else
                                    <span class="badge bg-warning">Upcoming</span>
                                @endif
                                @if($event->is_visible)
                                    <span class="badge bg-success ms-2">Visible</span>
                                @else
                                    <span class="badge bg-secondary ms-2">Hidden</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold text-muted small">Event Date & Time</label>
                                <p class="mb-0">{{ $event->event_date->format('F d, Y') }}</p>
                                <p class="text-muted">{{ $event->event_date->format('h:i A') }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold text-muted small">Location</label>
                                <p class="mb-0">{{ $event->location }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold text-muted small">Organizer</label>
                                <p class="mb-0">{{ $event->organizer ?? 'Adilisha' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold text-muted small">Created By</label>
                                <p class="mb-0">{{ $event->creator?->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    @if($event->registration_open_date || $event->registration_close_date)
                        <div class="row">
                            @if($event->registration_open_date)
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="fw-bold text-muted small">Registration Opens</label>
                                        <p class="mb-0">{{ $event->registration_open_date->format('F d, Y h:i A') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($event->registration_close_date)
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="fw-bold text-muted small">Registration Closes</label>
                                        <p class="mb-0">{{ $event->registration_close_date->format('F d, Y h:i A') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    @if($event->application_link)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="fw-bold text-muted small">Application/Registration Link</label>
                                    <p class="mb-0">
                                        <a href="{{ $event->application_link }}" target="_blank" class="text-primary">
                                            {{ $event->application_link }} <i class="ti ti-external-link"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="fw-bold text-muted small">Event Details</label>
                            <div class="p-3 bg-light rounded">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $event->details }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold text-muted small">Created At</label>
                                <p class="mb-0">{{ $event->created_at->format('F d, Y h:i A') }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold text-muted small">Last Updated</label>
                                <p class="mb-0">{{ $event->updated_at->format('F d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

