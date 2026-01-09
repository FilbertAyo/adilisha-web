<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Users Management</h5>
                    <p class="text-muted mb-0">Manage system users and administrators</p>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                    <i class="ti ti-plus me-1"></i> Add New User
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="usersTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info" 
                                                    onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')"
                                                    title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDeactivate({{ $user->id }}, '{{ $user->name }}')"
                                                    title="Deactivate">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No users found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="create_name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="create_name" name="name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="create_email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="create_email" name="email" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="create_password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="create_password" name="password" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="create_password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="create_password_confirmation" name="password_confirmation" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_user_id" name="user_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_password" class="form-label">Password <span class="text-muted">(Leave blank to keep current password)</span></label>
                            <input type="password" class="form-control" id="edit_password" name="password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="edit_password_confirmation" name="password_confirmation">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Deactivate User Modal -->
    <div class="modal fade" id="deactivateUserModal" tabindex="-1" aria-labelledby="deactivateUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deactivateUserModalLabel">Deactivate User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deactivateUserForm">
                    @csrf
                    <input type="hidden" id="deactivate_user_id" name="user_id">
                    <div class="modal-body">
                        <p>Are you sure you want to deactivate <strong id="deactivate_user_name"></strong>?</p>
                        <p class="text-danger mb-0">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Deactivate User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Create User
        document.getElementById('createUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Creating...';

            fetch('{{ route("admin.users.store") }}', {
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
                    alert('Error: ' + (data.message || 'Failed to create user'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Create User';
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
                    alert('Error: ' + (error.message || 'Failed to create user'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create User';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while creating the user');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create User';
            });
        });

        // Edit User
        function editUser(id, name, email) {
            document.getElementById('edit_user_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_password').value = '';
            document.getElementById('edit_password_confirmation').value = '';
            
            const modal = new bootstrap.Modal(document.getElementById('editUserModal'));
            modal.show();
        }

        document.getElementById('editUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const userId = document.getElementById('edit_user_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Updating...';

            fetch(`/admin/users/${userId}`, {
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
                    alert('Error: ' + (data.message || 'Failed to update user'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Update User';
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
                    alert('Error: ' + (error.message || 'Failed to update user'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Update User';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the user');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Update User';
            });
        });

        // Deactivate User
        function confirmDeactivate(id, name) {
            document.getElementById('deactivate_user_id').value = id;
            document.getElementById('deactivate_user_name').textContent = name;
            
            const modal = new bootstrap.Modal(document.getElementById('deactivateUserModal'));
            modal.show();
        }

        document.getElementById('deactivateUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const userId = document.getElementById('deactivate_user_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Deactivating...';

            fetch(`/admin/users/${userId}/deactivate`, {
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
                    alert('Error: ' + (data.message || 'Failed to deactivate user'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Deactivate User';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deactivating the user');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Deactivate User';
            });
        });
    </script>
    @endpush
</x-app-layout>

