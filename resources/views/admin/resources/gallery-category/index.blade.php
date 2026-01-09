<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Gallery Category Management</h5>
                    <p class="text-muted mb-0">Manage gallery categories displayed on the website</p>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                    <i class="ti ti-plus me-1"></i> Add New Category
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="categoriesTable">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category->order }}</td>
                                        <td><strong>{{ $category->name }}</strong></td>
                                        <td>{{ Str::limit($category->description ?? 'N/A', 100) }}</td>
                                        <td>
                                            @if($category->active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info" 
                                                    onclick="editCategory({{ $category->id }})"
                                                    title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDeactivate({{ $category->id }}, '{{ $category->name }}')"
                                                    title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No gallery categories found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Add New Gallery Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createCategoryForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="create_name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="create_name" name="name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="create_description" class="form-label">Description</label>
                            <textarea class="form-control" id="create_description" name="description" rows="3"></textarea>
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
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Gallery Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCategoryForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_category_id" name="category_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
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
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Deactivate Category Modal -->
    <div class="modal fade" id="deactivateCategoryModal" tabindex="-1" aria-labelledby="deactivateCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deactivateCategoryModalLabel">Delete Gallery Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deactivateCategoryForm">
                    @csrf
                    <input type="hidden" id="deactivate_category_id" name="category_id">
                    <div class="modal-body">
                        <p>Are you sure you want to delete this gallery category?</p>
                        <p class="text-danger mb-0">This action cannot be undone. Categories with associated galleries cannot be deleted.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Category data for editing
        let categoryData = @json($categories->keyBy('id'));

        // Create Category
        document.getElementById('createCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Creating...';

            fetch('{{ route("admin.gallery-category.store") }}', {
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
                    alert('Error: ' + (data.message || 'Failed to create category'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Create Category';
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
                    alert('Error: ' + (error.message || 'Failed to create category'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create Category';
            });
        });

        // Edit Category
        function editCategory(id) {
            const category = categoryData[id];
            if (!category) {
                alert('Category not found');
                return;
            }

            document.getElementById('edit_category_id').value = category.id;
            document.getElementById('edit_name').value = category.name;
            document.getElementById('edit_description').value = category.description || '';
            document.getElementById('edit_order').value = category.order;
            document.getElementById('edit_active').checked = category.active;
            
            const modal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
            modal.show();
        }

        document.getElementById('editCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const categoryId = document.getElementById('edit_category_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Updating...';

            fetch(`/admin/gallery-category/${categoryId}`, {
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
                    alert('Error: ' + (data.message || 'Failed to update category'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Update Category';
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
                    alert('Error: ' + (error.message || 'Failed to update category'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Update Category';
            });
        });

        // Deactivate Category
        function confirmDeactivate(id, name) {
            document.getElementById('deactivate_category_id').value = id;
            
            const modal = new bootstrap.Modal(document.getElementById('deactivateCategoryModal'));
            modal.show();
        }

        document.getElementById('deactivateCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const categoryId = document.getElementById('deactivate_category_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Deleting...';

            fetch(`/admin/gallery-category/${categoryId}/deactivate`, {
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
                    alert('Error: ' + (data.message || 'Failed to delete category'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Delete Category';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the category');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Delete Category';
            });
        });
    </script>
    @endpush
</x-app-layout>
