<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Gallery Management</h5>
                    <p class="text-muted mb-0">Manage gallery images displayed on the website</p>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGalleryModal">
                    <i class="ti ti-plus me-1"></i> Add New Image
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="galleryTable">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galleries as $gallery)
                                    <tr>
                                        <td>{{ $gallery->order }}</td>
                                        <td>
                                            @if($gallery->image_path)
                                                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title ?? 'Gallery image' }}" 
                                                     style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $gallery->title ?? 'Untitled' }}</td>
                                        <td>
                                            @if($gallery->active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info" 
                                                    onclick="editGallery({{ $gallery->id }})"
                                                    title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDeactivate({{ $gallery->id }}, '{{ $gallery->title ?? 'Image' }}')"
                                                    title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No gallery images found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Gallery Modal -->
    <div class="modal fade" id="createGalleryModal" tabindex="-1" aria-labelledby="createGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createGalleryModalLabel">Add New Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createGalleryForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="create_title" class="form-label">Title (Optional)</label>
                            <input type="text" class="form-control" id="create_title" name="title">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="create_image" class="form-label">Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="create_image" name="image" accept="image/*" required>
                            <small class="text-muted">Images will be automatically compressed to JPG format (max 400KB). Max upload size: 5MB</small>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="create_order" class="form-label">Order Number <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="create_order" name="order" min="0" value="0" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="create_active" name="active" checked>
                                <label class="form-check-label" for="create_active">
                                    Active (visible on website)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Gallery Modal -->
    <div class="modal fade" id="editGalleryModal" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGalleryModalLabel">Edit Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editGalleryForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_gallery_id" name="gallery_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Title (Optional)</label>
                            <input type="text" class="form-control" id="edit_title" name="title">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image. Images will be automatically compressed to JPG format (max 400KB).</small>
                            <div id="edit_current_image" class="mt-2"></div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_order" class="form-label">Order Number <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="edit_order" name="order" min="0" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="edit_active" name="active">
                                <label class="form-check-label" for="edit_active">
                                    Active (visible on website)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Deactivate Gallery Modal -->
    <div class="modal fade" id="deactivateGalleryModal" tabindex="-1" aria-labelledby="deactivateGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deactivateGalleryModalLabel">Delete Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deactivateGalleryForm">
                    @csrf
                    <input type="hidden" id="deactivate_gallery_id" name="gallery_id">
                    <div class="modal-body">
                        <p>Are you sure you want to delete this gallery image?</p>
                        <p class="text-danger mb-0">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Gallery data for editing
        let galleryData = @json($galleries->keyBy('id'));

        // Create Gallery
        document.getElementById('createGalleryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Uploading...';

            fetch('{{ route("admin.gallery.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => Promise.reject(err));
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to add gallery image'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Add Image';
                }
            })
            .catch(error => {
                if (error.errors) {
                    let errorMsg = 'Validation errors:\n';
                    Object.keys(error.errors).forEach(key => {
                        errorMsg += error.errors[key][0] + '\n';
                    });
                    alert(errorMsg);
                } else {
                    alert('Error: ' + (error.message || 'Failed to add gallery image'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Add Image';
            });
        });

        // Edit Gallery
        function editGallery(id) {
            const gallery = galleryData[id];
            if (!gallery) {
                alert('Gallery image not found');
                return;
            }

            document.getElementById('edit_gallery_id').value = gallery.id;
            document.getElementById('edit_title').value = gallery.title || '';
            document.getElementById('edit_order').value = gallery.order;
            document.getElementById('edit_active').checked = gallery.active;
            
            // Show current image
            const currentImageDiv = document.getElementById('edit_current_image');
            if (gallery.image_path) {
                currentImageDiv.innerHTML = `<img src="{{ asset('storage') }}/${gallery.image_path}" alt="Current image" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 4px;">`;
            } else {
                currentImageDiv.innerHTML = '<span class="text-muted">No image</span>';
            }
            
            const modal = new bootstrap.Modal(document.getElementById('editGalleryModal'));
            modal.show();
        }

        document.getElementById('editGalleryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const galleryId = document.getElementById('edit_gallery_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Updating...';

            fetch(`/admin/gallery/${galleryId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => Promise.reject(err));
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to update gallery image'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Update Image';
                }
            })
            .catch(error => {
                if (error.errors) {
                    let errorMsg = 'Validation errors:\n';
                    Object.keys(error.errors).forEach(key => {
                        errorMsg += error.errors[key][0] + '\n';
                    });
                    alert(errorMsg);
                } else {
                    alert('Error: ' + (error.message || 'Failed to update gallery image'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Update Image';
            });
        });

        // Deactivate Gallery
        function confirmDeactivate(id, title) {
            document.getElementById('deactivate_gallery_id').value = id;
            
            const modal = new bootstrap.Modal(document.getElementById('deactivateGalleryModal'));
            modal.show();
        }

        document.getElementById('deactivateGalleryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const galleryId = document.getElementById('deactivate_gallery_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Deleting...';

            fetch(`/admin/gallery/${galleryId}/deactivate`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to delete gallery image'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Delete Image';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the gallery image');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Delete Image';
            });
        });
    </script>
    @endpush
</x-app-layout>

