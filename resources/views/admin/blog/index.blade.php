<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Blog Management</h5>
                    <p class="text-muted mb-0">Manage blog posts displayed on the website</p>
                </div>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Create New Blog Post
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
                        <table class="table table-bordered table-hover" id="blogsTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Published Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                    <tr>
                                        <td>
                                            @if($blog->featured_image)
                                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" 
                                                     style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="max-width: 300px;">
                                                <strong>{{ $blog->title }}</strong>
                                                @if($blog->excerpt)
                                                    <br><small class="text-muted">{{ Str::limit($blog->excerpt, 80) }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            {{ $blog->author_name }}
                                            @if($blog->author_position)
                                                <br><small class="text-muted">{{ $blog->author_position }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($blog->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Draft</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($blog->published_at)
                                                {{ $blog->published_at->format('M d, Y') }}
                                            @else
                                                <span class="text-muted">Not published</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.blog.show', $blog) }}" class="btn btn-sm btn-success" title="View">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-sm btn-info" title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    onclick="confirmDelete({{ $blog->id }}, '{{ addslashes($blog->title) }}')"
                                                    title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No blog posts found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Blog Modal -->
    <div class="modal fade" id="deleteBlogModal" tabindex="-1" aria-labelledby="deleteBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBlogModalLabel">Delete Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteBlogForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong id="delete_blog_title"></strong>?</p>
                        <p class="text-danger mb-0">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Blog Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(id, title) {
            document.getElementById('delete_blog_title').textContent = title;
            document.getElementById('deleteBlogForm').action = `/admin/blog/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('deleteBlogModal'));
            modal.show();
        }
    </script>
    @endpush
</x-app-layout>

