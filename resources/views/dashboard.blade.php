<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Dashboard Overview</h5>
                    <p class="text-muted mb-0">Welcome back! Here's what's happening with your content.</p>
                </div>
                <div>
                    <small class="text-muted">Last updated: {{ now()->format('M d, Y h:i A') }}</small>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <!-- Blog Posts Statistics -->
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted mb-1 small">Blog Posts</p>
                                    <h4 class="mb-0">{{ $stats['blogs_total'] }}</h4>
                                    <small class="text-info">
                                        <i class="ti ti-eye"></i> {{ $stats['blogs_published'] }} Published
                                    </small>
                                </div>
                                <div class="avatar-lg bg-light-info rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-article text-info" style="font-size: 28px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Statistics -->
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted mb-1 small">Gallery Items</p>
                                    <h4 class="mb-0">{{ $stats['gallery_total'] }}</h4>
                                    <small class="text-success">
                                        <i class="ti ti-check"></i> {{ $stats['gallery_active'] }} Active
                                    </small>
                                </div>
                                <div class="avatar-lg bg-light-success rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-photo text-success" style="font-size: 28px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Members Statistics -->
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted mb-1 small">Team Members</p>
                                    <h4 class="mb-0">{{ $stats['team_total'] }}</h4>
                                    <small class="text-success">
                                        <i class="ti ti-users"></i> {{ $stats['team_active'] }} Active
                                    </small>
                                </div>
                                <div class="avatar-lg bg-light-warning rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-users-group text-warning" style="font-size: 28px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secondary Statistics Row -->
            <div class="row mb-4">
                <div class="col-md-4 col-xl-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted mb-1 small">Users</p>
                                    <h4 class="mb-0">{{ $stats['users_total'] }}</h4>
                                </div>
                                <div class="avatar-lg bg-light-secondary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user text-secondary" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted mb-1 small">Feedback</p>
                                    <h4 class="mb-0">{{ $stats['feedback_total'] }}</h4>
                                    <small class="text-info">
                                        <i class="ti ti-message"></i> {{ $stats['feedback_active'] }} Active
                                    </small>
                                </div>
                                <div class="avatar-lg bg-light-danger rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-message-circle text-danger" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted mb-1 small">Reports</p>
                                    <h4 class="mb-0">{{ $stats['reports_total'] }}</h4>
                                </div>
                                <div class="avatar-lg bg-light-primary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-file-text text-primary" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Recent Activity Section -->
            <div class="row">
                <!-- Recent Blog Posts -->
                <div class="col-md-12 col-xl-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-0 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Recent Blog Posts</h6>
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-link p-0">
                                    View All <i class="ti ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @forelse($recentBlogs as $blog)
                            <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                @if($blog->featured_image)
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" 
                                         class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="ti ti-article text-muted"></i>
                                    </div>
                                @endif
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ Str::limit($blog->title, 40) }}</h6>
                                    <small class="text-muted">
                                        <i class="ti ti-user"></i> {{ $blog->user->name ?? 'N/A' }}
                                        <span class="ms-2">
                                            @if($blog->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Draft</span>
                                            @endif
                                        </span>
                                    </small>
                                </div>
                                <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-sm btn-link p-0">
                                    <i class="ti ti-edit"></i>
                                </a>
                            </div>
                            @empty
                            <p class="text-muted text-center py-3 mb-0">No blog posts yet</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-0 pb-0">
                            <h6 class="mb-0">Quick Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-3 mb-3">
                                    <a href="{{ route('admin.blog.create') }}" class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-plus me-2"></i> Write Blog Post
                                    </a>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-3">
                                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-photo me-2"></i> Manage Gallery
                                    </a>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-3">
                                    <a href="{{ route('admin.feedback.index') }}" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-message-circle me-2"></i> View Feedback
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
