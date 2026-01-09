<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 offset-xl-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Create New Blog Post</h5>
                    <p class="text-muted mb-0">Write and publish a new blog post</p>
                </div>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                      id="excerpt" name="excerpt" rows="2" 
                                      placeholder="A brief summary of the blog post (optional)">{{ old('excerpt') }}</textarea>
                            <small class="text-muted">Short description shown in blog listings</small>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="15" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured Image</label>
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                   id="featured_image" name="featured_image" accept="image/*">
                            <small class="text-muted">Recommended size: 1200x630px. Max size: 2MB</small>
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">
                        <h6 class="mb-3">Author Information</h6>

                        <div class="mb-3">
                            <label class="form-label">Author Type <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="author_type" id="author_type_team" 
                                           value="team" {{ old('author_type', 'team') == 'team' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="author_type_team">
                                        Team Member
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="author_type" id="author_type_custom" 
                                           value="custom" {{ old('author_type') == 'custom' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="author_type_custom">
                                        Custom Author
                                    </label>
                                </div>
                            </div>
                            @error('author_type')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="team_member_section" style="display: {{ old('author_type', 'team') == 'team' ? 'block' : 'none' }};">
                            <div class="mb-3">
                                <label for="team_id" class="form-label">Select Team Member <span class="text-danger">*</span></label>
                                <select class="form-select @error('team_id') is-invalid @enderror" id="team_id" name="team_id">
                                    <option value="">-- Select Team Member --</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>
                                            {{ $team->name }} - {{ $team->position }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('team_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="custom_author_section" style="display: {{ old('author_type') == 'custom' ? 'block' : 'none' }};">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="custom_author_name" class="form-label">Author Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('custom_author_name') is-invalid @enderror" 
                                           id="custom_author_name" name="custom_author_name" value="{{ old('custom_author_name') }}">
                                    @error('custom_author_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="custom_author_position" class="form-label">Author Position</label>
                                    <input type="text" class="form-control @error('custom_author_position') is-invalid @enderror" 
                                           id="custom_author_position" name="custom_author_position" 
                                           value="{{ old('custom_author_position') }}" placeholder="e.g., Guest Writer">
                                    @error('custom_author_position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_published" 
                                       name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">
                                    Publish immediately
                                </label>
                            </div>
                            <small class="text-muted">If unchecked, blog post will be saved as draft</small>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Blog Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Toggle author sections
        document.querySelectorAll('input[name="author_type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const teamSection = document.getElementById('team_member_section');
                const customSection = document.getElementById('custom_author_section');
                
                if (this.value === 'team') {
                    teamSection.style.display = 'block';
                    customSection.style.display = 'none';
                    // Clear custom fields
                    document.getElementById('custom_author_name').value = '';
                    document.getElementById('custom_author_position').value = '';
                } else {
                    teamSection.style.display = 'none';
                    customSection.style.display = 'block';
                    // Clear team selection
                    document.getElementById('team_id').value = '';
                }
            });
        });
    </script>
    @endpush
</x-app-layout>

