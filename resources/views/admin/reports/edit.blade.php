<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-10 mx-auto">
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Edit Report</h5>
                        <p class="text-muted mb-0">Update report information</p>
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
                    <form action="{{ route('admin.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Report Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $report->title) }}" 
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3">{{ old('description', $report->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">PDF File</label>
                                    <input type="file" 
                                           class="form-control @error('file') is-invalid @enderror" 
                                           id="file" 
                                           name="file" 
                                           accept=".pdf">
                                    <small class="text-muted">Leave empty to keep current file. Max size: 10MB</small>
                                    @if($report->file_path)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-file-type-pdf me-1"></i> View Current PDF ({{ $report->file_size }})
                                            </a>
                                        </div>
                                    @endif
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
                                    <small class="text-muted">Upload a new cover image or leave empty to keep current. Max size: 2MB</small>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($report->thumbnail_path)
                                        <div class="mt-2">
                                            <p class="small text-muted mb-2">Current thumbnail:</p>
                                            <img src="{{ asset('storage/' . $report->thumbnail_path) }}" 
                                                 alt="Current thumbnail" 
                                                 style="max-width: 200px; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;">
                                        </div>
                                    @endif
                                    <div id="thumbnailPreview" class="mt-2" style="display: none;">
                                        <p class="small text-muted mb-2">New thumbnail preview:</p>
                                        <img id="thumbnailImg" src="" alt="Preview" style="max-width: 200px; max-height: 200px; border-radius: 8px; border: 2px solid #ddd;">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="highlights" class="form-label">Key Highlights</label>
                                    <input type="text" 
                                           class="form-control @error('highlights') is-invalid @enderror" 
                                           id="highlights" 
                                           name="highlights" 
                                           value="{{ old('highlights', is_array($report->highlights) ? implode(', ', $report->highlights) : '') }}" 
                                           placeholder="5K+ Students, 120 Schools, 250+ Teachers">
                                    <small class="text-muted">Separate with commas</small>
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
                                        <option value="annual" {{ old('category', $report->category) == 'annual' ? 'selected' : '' }}>Annual Report</option>
                                        <option value="program" {{ old('category', $report->category) == 'program' ? 'selected' : '' }}>Program Report</option>
                                        <option value="financial" {{ old('category', $report->category) == 'financial' ? 'selected' : '' }}>Financial Report</option>
                                        <option value="impact" {{ old('category', $report->category) == 'impact' ? 'selected' : '' }}>Impact Assessment</option>
                                        <option value="strategic" {{ old('category', $report->category) == 'strategic' ? 'selected' : '' }}>Strategic Document</option>
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
                                           value="{{ old('year', $report->year) }}" 
                                           maxlength="4">
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
                                           value="{{ old('published_date', $report->published_date ? $report->published_date->format('Y-m-d') : '') }}">
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
                                               {{ old('is_featured', $report->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Featured Report
                                        </label>
                                    </div>
                                </div>

                                <div class="alert alert-info">
                                    <small>
                                        <strong>Downloads:</strong> {{ $report->download_count }}<br>
                                        <strong>Created:</strong> {{ $report->created_at->format('M d, Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-check me-1"></i> Update Report
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

