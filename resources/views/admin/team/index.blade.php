<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Team Management</h5>
                    <p class="text-muted mb-0">Manage team members displayed on the website</p>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTeamModal">
                    <i class="ti ti-plus me-1"></i> Add New Team Member
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="teamsTable">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teams as $team)
                                    <tr>
                                        <td>{{ $team->order }}</td>
                                        <td>
                                            @if($team->profile_image)
                                                <img src="{{ asset('storage/' . $team->profile_image) }}" alt="{{ $team->name }}" 
                                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->email ?? 'N/A' }}</td>
                                        <td>{{ $team->position }}</td>
                                        <td>
                                            @if($team->type === 'board')
                                                <span class="badge bg-primary">Board</span>
                                            @else
                                                <span class="badge bg-info">Team</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($team->active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info" 
                                                    onclick="editTeam({{ $team->id }})"
                                                    title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDeactivate({{ $team->id }}, '{{ $team->name }}')"
                                                    title="Deactivate">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No team members found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Team Modal -->
    <div class="modal fade" id="createTeamModal" tabindex="-1" aria-labelledby="createTeamModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTeamModalLabel">Add New Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createTeamForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="create_name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="create_name" name="name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="create_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="create_email" name="email">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="create_position" class="form-label">Position <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="create_position" name="position" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="create_type" class="form-label">Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="create_type" name="type" required>
                                    <option value="team">Team Member</option>
                                    <option value="board">Board of Directors</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="create_order" class="form-label">Order Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="create_order" name="order" min="0" value="0" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="create_instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="create_instagram" name="instagram" placeholder="@username">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="create_linkedin" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="create_linkedin" name="linkedin" placeholder="URL or username">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="create_description" class="form-label">Description</label>
                            <textarea class="form-control" id="create_description" name="description" rows="3"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="create_profile_image" class="form-label">Profile Image (Square, Recommended: 500x500px)</label>
                            <input type="file" class="form-control" id="create_profile_image" name="profile_image" accept="image/*">
                            <small class="text-muted">Accepted formats: JPG, PNG, GIF. Max size: 2MB</small>
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
                        <button type="submit" class="btn btn-primary">Create Team Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Team Modal -->
    <div class="modal fade" id="editTeamModal" tabindex="-1" aria-labelledby="editTeamModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeamModalLabel">Edit Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editTeamForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_team_id" name="team_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="edit_email" name="email">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_position" class="form-label">Position <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_position" name="position" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_type" class="form-label">Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="edit_type" name="type" required>
                                    <option value="team">Team Member</option>
                                    <option value="board">Board of Directors</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_order" class="form-label">Order Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="edit_order" name="order" min="0" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="edit_instagram" name="instagram">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_linkedin" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="edit_linkedin" name="linkedin">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_profile_image" class="form-label">Profile Image (Square, Recommended: 500x500px)</label>
                            <input type="file" class="form-control" id="edit_profile_image" name="profile_image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image. Accepted formats: JPG, PNG, GIF. Max size: 2MB</small>
                            <div id="edit_current_image" class="mt-2"></div>
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
                        <button type="submit" class="btn btn-primary">Update Team Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Deactivate Team Modal -->
    <div class="modal fade" id="deactivateTeamModal" tabindex="-1" aria-labelledby="deactivateTeamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deactivateTeamModalLabel">Deactivate Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deactivateTeamForm">
                    @csrf
                    <input type="hidden" id="deactivate_team_id" name="team_id">
                    <div class="modal-body">
                        <p>Are you sure you want to deactivate <strong id="deactivate_team_name"></strong>?</p>
                        <p class="text-danger mb-0">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Deactivate Team Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Team data for editing
        let teamData = @json($teams->keyBy('id'));

        // Create Team
        document.getElementById('createTeamForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Creating...';

            fetch('{{ route("admin.team.store") }}', {
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
                    alert('Error: ' + (data.message || 'Failed to create team member'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Create Team Member';
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
                    alert('Error: ' + (error.message || 'Failed to create team member'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create Team Member';
            });
        });

        // Edit Team
        function editTeam(id) {
            const team = teamData[id];
            if (!team) {
                alert('Team member not found');
                return;
            }

            document.getElementById('edit_team_id').value = team.id;
            document.getElementById('edit_name').value = team.name;
            document.getElementById('edit_email').value = team.email || '';
            document.getElementById('edit_position').value = team.position;
            document.getElementById('edit_type').value = team.type || 'team';
            document.getElementById('edit_order').value = team.order;
            document.getElementById('edit_instagram').value = team.instagram || '';
            document.getElementById('edit_linkedin').value = team.linkedin || '';
            document.getElementById('edit_description').value = team.description || '';
            document.getElementById('edit_active').checked = team.active;
            
            // Show current image
            const currentImageDiv = document.getElementById('edit_current_image');
            if (team.profile_image) {
                currentImageDiv.innerHTML = `<img src="{{ asset('storage') }}/${team.profile_image}" alt="Current image" style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 4px;">`;
            } else {
                currentImageDiv.innerHTML = '<span class="text-muted">No image</span>';
            }
            
            const modal = new bootstrap.Modal(document.getElementById('editTeamModal'));
            modal.show();
        }

        document.getElementById('editTeamForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const teamId = document.getElementById('edit_team_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Updating...';

            fetch(`/admin/team/${teamId}`, {
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
                    alert('Error: ' + (data.message || 'Failed to update team member'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Update Team Member';
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
                    alert('Error: ' + (error.message || 'Failed to update team member'));
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Update Team Member';
            });
        });

        // Deactivate Team
        function confirmDeactivate(id, name) {
            document.getElementById('deactivate_team_id').value = id;
            document.getElementById('deactivate_team_name').textContent = name;
            
            const modal = new bootstrap.Modal(document.getElementById('deactivateTeamModal'));
            modal.show();
        }

        document.getElementById('deactivateTeamForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const teamId = document.getElementById('deactivate_team_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Deactivating...';

            fetch(`/admin/team/${teamId}/deactivate`, {
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
                    alert('Error: ' + (data.message || 'Failed to deactivate team member'));
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Deactivate Team Member';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deactivating the team member');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Deactivate Team Member';
            });
        });
    </script>
    @endpush
</x-app-layout>

