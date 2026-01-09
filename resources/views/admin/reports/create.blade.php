<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 mx-auto">
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Upload New Report</h5>
                        <p class="text-muted mb-0">Add a new report or document</p>
                    </div>
                    <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i> Back to Reports
                    </a>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Validation Error:</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.reports.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Report Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}" 
                                           required>
                                    <small class="text-muted">E.g., "Annual Report 2024" or "Financial Statement Q3 2024"</small>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3">{{ old('description') }}</textarea>
                                    <small class="text-muted">Brief description of the report content</small>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">PDF File <span class="text-danger">*</span></label>
                                    <input type="file" 
                                           class="form-control @error('file') is-invalid @enderror" 
                                           id="file" 
                                           name="file" 
                                           accept=".pdf"
                                           required>
                                    <small class="text-muted">Only PDF files. Max size: 10MB</small>
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Document Cover/Thumbnail Image</label>
                                    <input type="file" 
                                           class="form-control @error('thumbnail') is-invalid @enderror" 
                                           id="thumbnail" 
                                           name="thumbnail" 
                                           accept="image/*"
                                           onchange="previewThumbnail(this)">
                                    <small class="text-muted">Upload a cover image for this document (JPEG, PNG, WebP). Max size: 2MB</small>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="thumbnailPreview" class="mt-2" style="display: none;">
                                        <img id="thumbnailImg" src="" alt="Preview" style="max-width: 200px; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="highlights" class="form-label">Key Highlights</label>
                                    <input type="text" 
                                           class="form-control @error('highlights') is-invalid @enderror" 
                                           id="highlights" 
                                           name="highlights" 
                                           value="{{ old('highlights') }}" 
                                           placeholder="5K+ Students, 120 Schools, 250+ Teachers">
                                    <small class="text-muted">Separate with commas. E.g., "5K+ Students, 120 Schools, 250+ Teachers"</small>
                                    @error('highlights')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select @error('category') is-invalid @enderror" 
                                            id="category" 
                                            name="category" 
                                            required>
                                        <option value="">Select Category</option>
                                        <option value="annual" {{ old('category') == 'annual' ? 'selected' : '' }}>Annual Report</option>
                                        <option value="program" {{ old('category') == 'program' ? 'selected' : '' }}>Program Report</option>
                                        <option value="financial" {{ old('category') == 'financial' ? 'selected' : '' }}>Financial Report</option>
                                        <option value="impact" {{ old('category') == 'impact' ? 'selected' : '' }}>Impact Assessment</option>
                                        <option value="strategic" {{ old('category') == 'strategic' ? 'selected' : '' }}>Strategic Document</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="text" 
                                           class="form-control @error('year') is-invalid @enderror" 
                                           id="year" 
                                           name="year" 
                                           value="{{ old('year', date('Y')) }}" 
                                           maxlength="4"
                                           placeholder="2024">
                                    @error('year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="published_date" class="form-label">Published Date</label>
                                    <input type="date" 
                                           class="form-control @error('published_date') is-invalid @enderror" 
                                           id="published_date" 
                                           name="published_date" 
                                           value="{{ old('published_date', date('Y-m-d')) }}">
                                    @error('published_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="is_featured" 
                                               name="is_featured" 
                                               value="1"
                                               {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Featured Report
                                        </label>
                                    </div>
                                    <small class="text-muted">Featured reports appear at the top</small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-upload me-1"></i> Upload Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function previewThumbnail(input) {
            const preview = document.getElementById('thumbnailPreview');
            const img = document.getElementById('thumbnailImg');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.style.display = 'block';
                };
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
    @endpush
</x-app-layout>

