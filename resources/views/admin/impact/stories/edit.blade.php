<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 offset-xl-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Edit Success Story</h5>
                    <p class="text-muted mb-0">Update story details</p>
                </div>
                <a href="{{ route('admin.impact.stories.index') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.impact.stories.update', $story) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h6 class="mb-3">Basic Information</h6>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Person/Community Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $story->name) }}" required>
                                <small class="text-muted">e.g., Furaha Mwangi or Kigoma Community</small>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location', $story->location) }}" required>
                                <small class="text-muted">e.g., Dar es Salaam, Mwanza, Kigoma</small>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Story Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $story->title) }}" required>
                            <small class="text-muted">e.g., From Student to Robotics Club Founder</small>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                <option value="">-- Select Category --</option>
                                <option value="student" {{ old('category', $story->category) == 'student' ? 'selected' : '' }}>Student Story</option>
                                <option value="teacher" {{ old('category', $story->category) == 'teacher' ? 'selected' : '' }}>Teacher Story</option>
                                <option value="community" {{ old('category', $story->category) == 'community' ? 'selected' : '' }}>Community Impact</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                      id="excerpt" name="excerpt" rows="2" required>{{ old('excerpt', $story->excerpt) }}</textarea>
                            <small class="text-muted">Brief summary (1-2 sentences) shown in story listings</small>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Full Story <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="15" required>{{ old('content', $story->content) }}</textarea>
                            <small class="text-muted">Use HTML for formatting (paragraphs, bold, etc.)</small>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">
                        <h6 class="mb-3">Images</h6>

                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            @if($story->profile_picture)
                                <div class="mb-2">
                                    <img src="{{ file_exists(public_path('storage/' . $story->profile_picture)) ? asset('storage/' . $story->profile_picture) : asset($story->profile_picture) }}" 
                                         alt="{{ $story->name }}" 
                                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                    <br><small class="text-muted">Current profile picture</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" 
                                   id="profile_picture" name="profile_picture" accept="image/*">
                            <small class="text-muted">Upload new to replace. Recommended: Square ratio. Max: 2MB</small>
                            @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="image_1" class="form-label">Additional Image 1</label>
                                @if($story->image_1)
                                    <div class="mb-2">
                                        <img src="{{ file_exists(public_path('storage/' . $story->image_1)) ? asset('storage/' . $story->image_1) : asset($story->image_1) }}" 
                                             alt="{{ $story->name }}" 
                                             style="max-width: 100%; height: auto; border-radius: 8px;">
                                        <br><small class="text-muted">Current image 1</small>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image_1') is-invalid @enderror" 
                                       id="image_1" name="image_1" accept="image/*">
                                <small class="text-muted">Upload new to replace</small>
                                @error('image_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image_2" class="form-label">Additional Image 2</label>
                                @if($story->image_2)
                                    <div class="mb-2">
                                        <img src="{{ file_exists(public_path('storage/' . $story->image_2)) ? asset('storage/' . $story->image_2) : asset($story->image_2) }}" 
                                             alt="{{ $story->name }}" 
                                             style="max-width: 100%; height: auto; border-radius: 8px;">
                                        <br><small class="text-muted">Current image 2</small>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image_2') is-invalid @enderror" 
                                       id="image_2" name="image_2" accept="image/*">
                                <small class="text-muted">Upload new to replace</small>
                                @error('image_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">
                        <h6 class="mb-3">Display Settings</h6>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Display Order</label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                       id="order" name="order" value="{{ old('order', $story->order) }}" min="0">
                                <small class="text-muted">Lower numbers appear first (0 = highest priority)</small>
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="is_featured" 
                                       name="is_featured" value="1" {{ old('is_featured', $story->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    Featured Story
                                </label>
                            </div>
                            <small class="text-muted">Featured stories are highlighted on the website</small>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_published" 
                                       name="is_published" value="1" {{ old('is_published', $story->is_published) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">
                                    Publish immediately
                                </label>
                            </div>
                            <small class="text-muted">If unchecked, story will be saved as draft</small>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('admin.impact.stories.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Success Story</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

