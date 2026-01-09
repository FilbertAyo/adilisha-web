<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 offset-xl-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">View Blog Post</h5>
                    <p class="text-muted mb-0">Preview blog post details</p>
                </div>
                <div>
                    <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-info">
                        <i class="ti ti-edit me-1"></i> Edit
                    </a>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i> Back to List
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @if($blog->featured_image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                 alt="{{ $blog->title }}" 
                                 class="img-fluid rounded" 
                                 style="max-height: 400px; width: 100%; object-fit: cover;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <h2>{{ $blog->title }}</h2>
                    </div>

                    <div class="mb-3 d-flex gap-3 flex-wrap">
                        <div>
                            <strong>Status:</strong>
                            @if($blog->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </div>
                        <div>
                            <strong>Author:</strong> {{ $blog->author_name }}
                            @if($blog->author_position)
                                <span class="text-muted">({{ $blog->author_position }})</span>
                            @endif
                        </div>
                        <div>
                            <strong>Created By:</strong> {{ $blog->user->name }}
                        </div>
                        @if($blog->published_at)
                            <div>
                                <strong>Published:</strong> {{ $blog->published_at->format('M d, Y \a\t h:i A') }}
                            </div>
                        @endif
                    </div>

                    @if($blog->excerpt)
                        <div class="mb-4">
                            <h5>Excerpt:</h5>
                            <p class="text-muted">{{ $blog->excerpt }}</p>
                        </div>
                    @endif

                    <div class="mb-3">
                        <h5>Content:</h5>
                        <div style="white-space: pre-wrap;">{{ $blog->content }}</div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <small class="text-muted">
                            Created: {{ $blog->created_at->format('M d, Y \a\t h:i A') }}
                            @if($blog->updated_at != $blog->created_at)
                                | Last Updated: {{ $blog->updated_at->format('M d, Y \a\t h:i A') }}
                            @endif
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

