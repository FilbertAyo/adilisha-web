<x-landing-layout>

  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="#">Resources</a></span>
            <span>Reports</span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Reports & Documents</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Transparency & Accountability</h2>
          <p>
            Access our annual reports, financial statements, impact assessments, and 
            strategic documents. We believe in transparency and accountability to our 
            beneficiaries, donors, and partners.
          </p>
        </div>
      </div>

      <!-- Search and Filter Section -->
      <div class="row justify-content-center mb-4">
        <div class="col-md-10">
          <form action="{{ route('reports.index') }}" method="GET" class="search-filter-form" style="background: #f8f9fa; padding: 20px; border-radius: 10px;">
            <div class="row">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="input-group">
                  <input type="text" 
                         class="form-control" 
                         name="search" 
                         placeholder="Search reports by title or keyword..." 
                         value="{{ request('search') }}"
                         style="border-radius: 5px 0 0 5px; border: 1px solid #ddd; padding: 10px 15px;">
                  <button class="btn btn-primary" type="submit" style="border-radius: 0 5px 5px 0; padding: 10px 20px;">
                    <i class="icon-search"></i> Search
                  </button>
                </div>
              </div>
              <div class="col-md-3 mb-3 mb-md-0">
                <select class="form-control" name="category" onchange="this.form.submit()" style="border-radius: 5px; border: 1px solid #ddd; padding: 10px 15px; height: auto;">
                  <option value="">All Categories</option>
                  <option value="annual" {{ request('category') == 'annual' ? 'selected' : '' }}>Annual Reports</option>
                  <option value="program" {{ request('category') == 'program' ? 'selected' : '' }}>Program Reports</option>
                  <option value="financial" {{ request('category') == 'financial' ? 'selected' : '' }}>Financial Reports</option>
                  <option value="impact" {{ request('category') == 'impact' ? 'selected' : '' }}>Impact Assessments</option>
                  <option value="strategic" {{ request('category') == 'strategic' ? 'selected' : '' }}>Strategic Documents</option>
                </select>
              </div>
              <div class="col-md-2 mb-3 mb-md-0">
                <select class="form-control" name="year" onchange="this.form.submit()" style="border-radius: 5px; border: 1px solid #ddd; padding: 10px 15px; height: auto;">
                  <option value="">All Years</option>
                  @foreach($years as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2">
                @if(request()->hasAny(['search', 'category', 'year']))
                  <a href="{{ route('reports.index') }}" class="btn btn-secondary w-100" style="border-radius: 5px; padding: 10px;">
                    <i class="icon-close mr-1"></i>Clear
                  </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section pt-0">
    <div class="container">
      @if($reports->count() > 0)
        <div class="row">
          @foreach($reports as $report)
            <div class="col-md-6 col-lg-4 ftco-animate mb-4">
              <div class="card border-0 shadow-sm h-100">
                @if($report->thumbnail_path)
                  <div style="height: 200px; overflow: hidden; border-radius: 8px 8px 0 0;">
                    <img src="{{ asset('storage/' . $report->thumbnail_path) }}" 
                         alt="{{ $report->title }}" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                  </div>
                @else
                  <div class="bg-primary" style="height: 200px; border-radius: 8px 8px 0 0; display: flex; align-items: center; justify-content: center;">
                    <i class="icon-file-pdf-o text-white" style="font-size: 64px; opacity: 0.8;"></i>
                  </div>
                @endif
                
                <div class="card-body d-flex flex-column">
                  <div class="mb-3">
                    <h5 class="mb-1">{{ $report->title }}</h5>
                    <small class="text-muted">
                      {{ $report->published_date ? $report->published_date->format('F Y') : 'N/A' }}
                    </small>
                    @if($report->is_featured)
                      <span class="badge badge-warning ml-2" style="font-size: 10px;">Featured</span>
                    @endif
                  </div>

                  <div class="mb-2">
                    <span class="badge badge-info" style="font-size: 11px;">{{ ucfirst($report->category) }}</span>
                    @if($report->year)
                      <span class="badge badge-secondary ml-1" style="font-size: 11px;">{{ $report->year }}</span>
                    @endif
                  </div>

                  @if($report->description)
                    <p class="text-muted small mb-3">
                      {{ Str::limit($report->description, 100) }}
                    </p>
                  @endif

                  @if($report->highlights && count($report->highlights) > 0)
                    <div class="mb-3">
                      <small class="text-muted d-block mb-2"><strong>Key Highlights:</strong></small>
                      <div class="d-flex flex-wrap">
                        @foreach($report->highlights as $highlight)
                          <span class="badge badge-light border mr-2 mb-2">{{ $highlight }}</span>
                        @endforeach
                      </div>
                    </div>
                  @endif

                  <div class="mt-auto d-flex justify-content-between align-items-center">
                    <a href="{{ route('reports.download', $report->id) }}" class="btn btn-primary btn-sm">
                      <i class="icon-download mr-2"></i>Download ({{ $report->file_size }})
                    </a>
                    <small class="text-muted">
                      <i class="icon-download"></i> {{ $report->download_count }}
                    </small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Pagination -->
        @if($reports->hasPages())
          <div class="row mt-5">
            <div class="col text-center">
              <div class="block-27">
                {{ $reports->links() }}
              </div>
            </div>
          </div>
        @endif
      @else
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="alert alert-info">
              <i class="icon-info-circle mr-2"></i>
              @if(request()->hasAny(['search', 'category', 'year']))
                No reports found matching your search criteria. <a href="{{ route('reports.index') }}">Clear filters</a>
              @else
                No reports available at this time. Please check back later.
              @endif
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>


 
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center ftco-animate">
          <h3 class="mb-4">Need More Information?</h3>
          <p>
            Looking for specific data, reports, or research findings? We're happy to 
            share additional documentation with partners, researchers, and stakeholders.
          </p>
          <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-3 mt-3">
            Request Documents
          </a>
        </div>
      </div>
    </div>
  </section>

</x-landing-layout>

