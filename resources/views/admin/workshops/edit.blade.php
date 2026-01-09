<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 offset-xl-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Edit Workshop</h5>
                    <p class="text-muted mb-0">Update workshop details and manage related content</p>
                </div>
                <a href="{{ route('admin.workshops.index') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Back to List
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Workshop Basic Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">Workshop Details</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.workshops.update', $workshop) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h6 class="mb-3">Basic Information</h6>

                        <div class="mb-3">
                            <label for="title" class="form-label">Workshop Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $workshop->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (URL)</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug', $workshop->slug) }}">
                            <small class="text-muted">Used in the URL</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="workshop_date" class="form-label">Workshop Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('workshop_date') is-invalid @enderror" 
                                           id="workshop_date" name="workshop_date" 
                                           value="{{ old('workshop_date', $workshop->workshop_date->format('Y-m-d')) }}" required>
                                    @error('workshop_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('start_time') is-invalid @enderror" 
                                           id="start_time" name="start_time" 
                                           value="{{ old('start_time', $workshop->start_time->format('H:i')) }}" required>
                                    @error('start_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('end_time') is-invalid @enderror" 
                                           id="end_time" name="end_time" 
                                           value="{{ old('end_time', $workshop->end_time->format('H:i')) }}" required>
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
                                           id="location" name="location" value="{{ old('location', $workshop->location) }}" required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="text" class="form-control @error('duration') is-invalid @enderror" 
                                           id="duration" name="duration" value="{{ old('duration', $workshop->duration) }}">
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="overview" class="form-label">Workshop Overview</label>
                            <textarea class="form-control @error('overview') is-invalid @enderror" 
                                      id="overview" name="overview" rows="4">{{ old('overview', $workshop->overview) }}</textarea>
                            @error('overview')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="what_we_learned" class="form-label">What We Learned</label>
                            <textarea class="form-control @error('what_we_learned') is-invalid @enderror" 
                                      id="what_we_learned" name="what_we_learned" rows="4">{{ old('what_we_learned', $workshop->what_we_learned) }}</textarea>
                            @error('what_we_learned')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="main_image" class="form-label">Main Workshop Image</label>
                            @if($workshop->main_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $workshop->main_image) }}" alt="Current image" 
                                         style="max-width: 300px; border-radius: 4px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('main_image') is-invalid @enderror" 
                                   id="main_image" name="main_image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image. Max size: 5MB</small>
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
                                           id="total_participants" name="total_participants" 
                                           value="{{ old('total_participants', $workshop->total_participants) }}" min="0">
                                    @error('total_participants')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="girls_participation" class="form-label">Girls Participation</label>
                                    <input type="number" class="form-control @error('girls_participation') is-invalid @enderror" 
                                           id="girls_participation" name="girls_participation" 
                                           value="{{ old('girls_participation', $workshop->girls_participation) }}" min="0">
                                    @error('girls_participation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="attendance_rate" class="form-label">Attendance Rate (%)</label>
                                    <input type="number" class="form-control @error('attendance_rate') is-invalid @enderror" 
                                           id="attendance_rate" name="attendance_rate" 
                                           value="{{ old('attendance_rate', $workshop->attendance_rate) }}" 
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
                                           id="schools_represented" name="schools_represented" 
                                           value="{{ old('schools_represented', $workshop->schools_represented) }}" min="0">
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
                                        <option value="upcoming" {{ old('status', $workshop->status) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                        <option value="ongoing" {{ old('status', $workshop->status) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="completed" {{ old('status', $workshop->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ old('status', $workshop->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
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
                                            <option value="{{ $tag->id }}" 
                                                {{ in_array($tag->id, old('tags', $workshop->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
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
                                       value="1" {{ old('is_active', $workshop->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active (Display on website)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-check me-1"></i> Update Workshop
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Gallery Images Section -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Gallery Images</h6>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
                        <i class="ti ti-plus"></i> Add Images
                    </button>
                </div>
                <div class="card-body">
                    <div class="row" id="galleryContainer">
                        @forelse($workshop->galleries as $gallery)
                            <div class="col-md-3 mb-3" data-gallery-id="{{ $gallery->id }}">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" class="card-img-top" alt="Gallery image">
                                    <div class="card-body p-2">
                                        <input type="text" class="form-control form-control-sm mb-2" 
                                               value="{{ $gallery->caption }}" 
                                               placeholder="Caption..." 
                                               onchange="updateGalleryCaption({{ $gallery->id }}, this.value)">
                                        <button class="btn btn-sm btn-danger w-100" 
                                                onclick="deleteGalleryImage({{ $gallery->id }})">
                                            <i class="ti ti-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted text-center">No gallery images yet. Click "Add Images" to upload.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Testimonials</h6>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                        <i class="ti ti-plus"></i> Add Testimonial
                    </button>
                </div>
                <div class="card-body">
                    <div id="testimonialsContainer">
                        @forelse($workshop->testimonials as $testimonial)
                            <div class="border rounded p-3 mb-3" data-testimonial-id="{{ $testimonial->id }}">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="d-flex">
                                        @if($testimonial->image)
                                            <img src="{{ asset('storage/' . $testimonial->image) }}" 
                                                 class="rounded-circle me-3" 
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                            <small class="text-muted">{{ $testimonial->role }}{{ $testimonial->school ? ' - ' . $testimonial->school : '' }}</small>
                                            <p class="mt-2 mb-0">{{ $testimonial->testimonial }}</p>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-info" 
                                                onclick="editTestimonial({{ $testimonial->id }})">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" 
                                                onclick="deleteTestimonial({{ $testimonial->id }})">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center">No testimonials yet. Click "Add Testimonial" to create one.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Beneficiaries Section -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Beneficiaries</h6>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">
                        <i class="ti ti-plus"></i> Add Beneficiary
                    </button>
                </div>
                <div class="card-body">
                    <div class="row" id="beneficiariesContainer">
                        @forelse($workshop->beneficiaries as $beneficiary)
                            <div class="col-md-4 mb-3" data-beneficiary-id="{{ $beneficiary->id }}">
                                <div class="card text-center">
                                    @if($beneficiary->image)
                                        <img src="{{ asset('storage/' . $beneficiary->image) }}" 
                                             class="card-img-top rounded-circle mx-auto mt-3" 
                                             style="width: 150px; height: 150px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h6 class="mb-1">{{ $beneficiary->name }}</h6>
                                        <p class="text-muted small mb-2">{{ $beneficiary->future_aspiration }}</p>
                                        <button class="btn btn-sm btn-danger" 
                                                onclick="deleteBeneficiary({{ $beneficiary->id }})">
                                            <i class="ti ti-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted text-center">No beneficiaries yet. Click "Add Beneficiary" to create one.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Gallery Modal -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Gallery Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addGalleryForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Select Images <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="images[]" multiple accept="image/*" required>
                            <small class="text-muted">You can select multiple images at once</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload Images</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Testimonial Modal -->
    <div class="modal fade" id="addTestimonialModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addTestimonialForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="role" placeholder="e.g., Student, Teacher" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">School</label>
                            <input type="text" class="form-control" name="school">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Testimonial <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="testimonial" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Beneficiary Modal -->
    <div class="modal fade" id="addBeneficiaryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Beneficiary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addBeneficiaryForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Future Aspiration</label>
                            <input type="text" class="form-control" name="future_aspiration" placeholder="e.g., Future Engineer">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Beneficiary</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const workshopId = {{ $workshop->id }};
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Gallery Functions
        document.getElementById('addGalleryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch(`/admin/workshops/${workshopId}/galleries`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function updateGalleryCaption(galleryId, caption) {
            fetch(`/admin/workshops/${workshopId}/galleries/${galleryId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ caption: caption })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert('Caption updated successfully!', 'success');
                }
            });
        }

        function deleteGalleryImage(galleryId) {
            if (!confirm('Are you sure you want to delete this image?')) return;
            
            fetch(`/admin/workshops/${workshopId}/galleries/${galleryId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`[data-gallery-id="${galleryId}"]`).remove();
                    showAlert('Image deleted successfully!', 'success');
                }
            });
        }

        // Testimonial Functions
        document.getElementById('addTestimonialForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch(`/admin/workshops/${workshopId}/testimonials`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function deleteTestimonial(testimonialId) {
            if (!confirm('Are you sure you want to delete this testimonial?')) return;
            
            fetch(`/admin/workshops/${workshopId}/testimonials/${testimonialId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`[data-testimonial-id="${testimonialId}"]`).remove();
                    showAlert('Testimonial deleted successfully!', 'success');
                }
            });
        }

        // Beneficiary Functions
        document.getElementById('addBeneficiaryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch(`/admin/workshops/${workshopId}/beneficiaries`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function deleteBeneficiary(beneficiaryId) {
            if (!confirm('Are you sure you want to remove this beneficiary?')) return;
            
            fetch(`/admin/workshops/${workshopId}/beneficiaries/${beneficiaryId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`[data-beneficiary-id="${beneficiaryId}"]`).remove();
                    showAlert('Beneficiary removed successfully!', 'success');
                }
            });
        }

        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.querySelector('.col-md-12').insertBefore(alertDiv, document.querySelector('.card'));
            setTimeout(() => alertDiv.remove(), 3000);
        }
    </script>
    @endpush
</x-app-layout>

