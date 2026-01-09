<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 offset-xl-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Create New Workshop</h5>
                    <p class="text-muted mb-0">Add a new workshop with details</p>
                </div>
                <a href="{{ route('admin.workshops.index') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.workshops.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h6 class="mb-3">Basic Information</h6>

                        <div class="mb-3">
                            <label for="title" class="form-label">Workshop Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (URL)</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug') }}" 
                                   placeholder="Leave empty to auto-generate from title">
                            <small class="text-muted">Used in the URL. Leave empty to auto-generate.</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="workshop_date" class="form-label">Workshop Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('workshop_date') is-invalid @enderror" 
                                           id="workshop_date" name="workshop_date" value="{{ old('workshop_date') }}" required>
                                    @error('workshop_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('start_time') is-invalid @enderror" 
                                           id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                                    @error('start_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('end_time') is-invalid @enderror" 
                                           id="end_time" name="end_time" value="{{ old('end_time') }}" required>
                                    @error('end_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location') }}" 
                                           placeholder="e.g., Office HQ, Bunda, Dar es Salaam" required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="text" class="form-control @error('duration') is-invalid @enderror" 
                                           id="duration" name="duration" value="{{ old('duration') }}" 
                                           placeholder="e.g., Full Day, 2 hours">
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="overview" class="form-label">Workshop Overview</label>
                            <textarea class="form-control @error('overview') is-invalid @enderror" 
                                      id="overview" name="overview" rows="4">{{ old('overview') }}</textarea>
                            <small class="text-muted">Brief description of the workshop</small>
                            @error('overview')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="what_we_learned" class="form-label">What We Learned</label>
                            <textarea class="form-control @error('what_we_learned') is-invalid @enderror" 
                                      id="what_we_learned" name="what_we_learned" rows="4">{{ old('what_we_learned') }}</textarea>
                            <small class="text-muted">Key takeaways and learnings from the workshop</small>
                            @error('what_we_learned')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="main_image" class="form-label">Main Workshop Image</label>
                            <input type="file" class="form-control @error('main_image') is-invalid @enderror" 
                                   id="main_image" name="main_image" accept="image/*">
                            <small class="text-muted">Main image for the workshop. Max size: 5MB</small>
                            @error('main_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">
                        <h6 class="mb-3">Participation & Attendance</h6>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="total_participants" class="form-label">Total Participants</label>
                                    <input type="number" class="form-control @error('total_participants') is-invalid @enderror" 
                                           id="total_participants" name="total_participants" value="{{ old('total_participants', 0) }}" min="0">
                                    @error('total_participants')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="girls_participation" class="form-label">Girls Participation</label>
                                    <input type="number" class="form-control @error('girls_participation') is-invalid @enderror" 
                                           id="girls_participation" name="girls_participation" value="{{ old('girls_participation', 0) }}" min="0">
                                    @error('girls_participation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="attendance_rate" class="form-label">Attendance Rate (%)</label>
                                    <input type="number" class="form-control @error('attendance_rate') is-invalid @enderror" 
                                           id="attendance_rate" name="attendance_rate" value="{{ old('attendance_rate', 0) }}" 
                                           min="0" max="100" step="0.01">
                                    @error('attendance_rate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="schools_represented" class="form-label">Schools Represented</label>
                                    <input type="number" class="form-control @error('schools_represented') is-invalid @enderror" 
                                           id="schools_represented" name="schools_represented" value="{{ old('schools_represented', 0) }}" min="0">
                                    @error('schools_represented')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <h6 class="mb-3">Status & Tags</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                        <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Workshop Tags</label>
                                    <select class="form-select" name="tags[]" multiple size="5">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Hold Ctrl/Cmd to select multiple tags</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                       value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active (Display on website)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.workshops.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-check me-1"></i> Create Workshop
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

