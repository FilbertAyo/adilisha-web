<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 offset-xl-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Edit Event</h5>
                    <p class="text-muted mb-0">Update event information</p>
                </div>
                <a href="{{ route('admin.resources.events.index') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.resources.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Event Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $event->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Event Type <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="competition" {{ old('type', $event->type) == 'competition' ? 'selected' : '' }}>Competition</option>
                                        <option value="workshop" {{ old('type', $event->type) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                        <option value="training" {{ old('type', $event->type) == 'training' ? 'selected' : '' }}>Training</option>
                                        <option value="seminar" {{ old('type', $event->type) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                                        <option value="conference" {{ old('type', $event->type) == 'conference' ? 'selected' : '' }}>Conference</option>
                                        <option value="showcase" {{ old('type', $event->type) == 'showcase' ? 'selected' : '' }}>Showcase</option>
                                        <option value="career fair" {{ old('type', $event->type) == 'career fair' ? 'selected' : '' }}>Career Fair</option>
                                        <option value="bootcamp" {{ old('type', $event->type) == 'bootcamp' ? 'selected' : '' }}>Bootcamp</option>
                                        <option value="summit" {{ old('type', $event->type) == 'summit' ? 'selected' : '' }}>Summit</option>
                                        <option value="other" {{ old('type', $event->type) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="details" class="form-label">Event Details <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('details') is-invalid @enderror" 
                                      id="details" name="details" rows="5" required>{{ old('details', $event->details) }}</textarea>
                            <small class="text-muted">Describe the event, its objectives, and what participants can expect</small>
                            @error('details')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location', $event->location) }}" 
                                           placeholder="e.g., University of Dar es Salaam" required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="organizer" class="form-label">Organizer</label>
                                    <input type="text" class="form-control @error('organizer') is-invalid @enderror" 
                                           id="organizer" name="organizer" value="{{ old('organizer', $event->organizer) }}" 
                                           placeholder="Organization name">
                                    @error('organizer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Event Date & Time <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control @error('event_date') is-invalid @enderror" 
                                           id="event_date" name="event_date" 
                                           value="{{ old('event_date', $event->event_date->format('Y-m-d\TH:i')) }}" required>
                                    @error('event_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="source" class="form-label">Event Source <span class="text-danger">*</span></label>
                                    <select class="form-select @error('source') is-invalid @enderror" id="source" name="source" required>
                                        <option value="internal" {{ old('source', $event->source) == 'internal' ? 'selected' : '' }}>Internal (Adilisha Event)</option>
                                        <option value="external" {{ old('source', $event->source) == 'external' ? 'selected' : '' }}>External (Partner Event)</option>
                                    </select>
                                    @error('source')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="registration_open_date" class="form-label">Registration Opens</label>
                                    <input type="datetime-local" class="form-control @error('registration_open_date') is-invalid @enderror" 
                                           id="registration_open_date" name="registration_open_date" 
                                           value="{{ old('registration_open_date', $event->registration_open_date?->format('Y-m-d\TH:i')) }}">
                                    <small class="text-muted">When registration starts (optional)</small>
                                    @error('registration_open_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="registration_close_date" class="form-label">Registration Closes</label>
                                    <input type="datetime-local" class="form-control @error('registration_close_date') is-invalid @enderror" 
                                           id="registration_close_date" name="registration_close_date" 
                                           value="{{ old('registration_close_date', $event->registration_close_date?->format('Y-m-d\TH:i')) }}">
                                    <small class="text-muted">When registration ends (optional)</small>
                                    @error('registration_close_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="application_link" class="form-label">Application/Registration Link</label>
                            <input type="url" class="form-control @error('application_link') is-invalid @enderror" 
                                   id="application_link" name="application_link" 
                                   value="{{ old('application_link', $event->application_link) }}" 
                                   placeholder="https://example.com/register">
                            <small class="text-muted">Link to external registration or application form (optional)</small>
                            @error('application_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Event Image</label>
                            @if($event->image)
                                <div class="mb-2">
                                    <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" 
                                         style="max-width: 200px; height: auto; border-radius: 4px;">
                                    <p class="text-muted small mb-0 mt-1">Current image</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <small class="text-muted">Upload a new image to replace the current one (JPG, PNG, GIF - Max 2MB)</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" 
                                       {{ old('is_visible', $event->is_visible) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_visible">
                                    Make event visible on website
                                </label>
                            </div>
                            <small class="text-muted">Event will be displayed on the website when checked</small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-check me-1"></i> Update Event
                            </button>
                            <a href="{{ route('admin.resources.events.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

