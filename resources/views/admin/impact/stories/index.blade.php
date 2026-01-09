<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Success Stories Management</h5>
                    <p class="text-muted mb-0">Manage inspiring success stories from our programs</p>
                </div>
                <a href="{{ route('admin.impact.stories.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Create New Story
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
                        <table class="table table-bordered table-hover" id="storiesTable">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name & Title</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($stories as $story)
                                    <tr>
                                        <td>
                                            @if($story->profile_picture)
                                                @php
                                                    $imageUrl = file_exists(public_path('storage/' . $story->profile_picture)) 
                                                        ? asset('storage/' . $story->profile_picture) 
                                                        : asset($story->profile_picture);
                                                @endphp
                                                <img src="{{ $imageUrl }}" alt="{{ $story->name }}" 
                                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="width: 60px; height: 60px; background: #e9ecef; border-radius: 50%;">
                                                    <i class="ti ti-user" style="font-size: 24px; color: #6c757d;"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="max-width: 300px;">
                                                <strong>{{ $story->name }}</strong>
                                                <br><small class="text-muted">{{ $story->title }}</small>
                                            </div>
                                        </td>
                                        <td>{{ $story->location }}</td>
                                        <td>
                                            @switch($story->category)
                                                @case('student')
                                                    <span class="badge bg-info">Student</span>
                                                    @break
                                                @case('teacher')
                                                    <span class="badge bg-success">Teacher</span>
                                                    @break
                                                @case('community')
                                                    <span class="badge bg-warning">Community</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @if($story->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Draft</span>
                                            @endif
                                            @if($story->is_featured)
                                                <br><span class="badge bg-primary mt-1">Featured</span>
                                            @endif
                                        </td>
                                        <td>{{ $story->order }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('impact.stories.show', $story->id) }}" 
                                                   class="btn btn-sm btn-success" 
                                                   title="View" 
                                                   target="_blank">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.impact.stories.edit', $story) }}" 
                                                   class="btn btn-sm btn-info" 
                                                   title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDelete({{ $story->id }}, '{{ addslashes($story->name) }}')"
                                                    title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No success stories found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $stories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Story Modal -->
    <div class="modal fade" id="deleteStoryModal" tabindex="-1" aria-labelledby="deleteStoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStoryModalLabel">Delete Success Story</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteStoryForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Are you sure you want to delete the story of <strong id="delete_story_name"></strong>?</p>
                        <p class="text-danger mb-0">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Story</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(id, name) {
            document.getElementById('delete_story_name').textContent = name;
            document.getElementById('deleteStoryForm').action = `/admin/impact/stories/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('deleteStoryModal'));
            modal.show();
        }
    </script>
    @endpush
</x-app-layout>

