<x-landing-layout>
    
    <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Programs</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">STEM Workshops</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section">
      <div class="container">
        
        <!-- Filter Section -->
        <div class="row mb-4">
          <div class="col-md-12">
            <div class="mb-3">
              <a href="{{ route('events') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-dark' }} mr-2">
                All ({{ $counts['all'] }})
              </a>
              <a href="{{ route('events', ['status' => 'upcoming']) }}" class="btn btn-sm {{ request('status') == 'upcoming' ? 'btn-primary' : 'btn-dark' }} mr-2">
                Upcoming ({{ $counts['upcoming'] }})
              </a>
              <a href="{{ route('events', ['status' => 'completed']) }}" class="btn btn-sm {{ request('status') == 'completed' ? 'btn-primary' : 'btn-dark' }}">
                Completed ({{ $counts['completed'] }})
              </a>
            </div>
            
            <!-- Advanced Filters -->
            <div class="card">
              <div class="card-body p-3">
                <form method="GET" action="{{ route('events') }}" class="row align-items-end g-3">
                  @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                  @endif
                  
                  <div class="col-md-3">
                    <label for="from_date" class="form-label small mb-1">From Date</label>
                    <input type="date" name="from_date" id="from_date" class="form-control form-control-sm" 
                           value="{{ request('from_date') }}">
                  </div>
                  
                  <div class="col-md-3">
                    <label for="to_date" class="form-label small mb-1">To Date</label>
                    <input type="date" name="to_date" id="to_date" class="form-control form-control-sm" 
                           value="{{ request('to_date') }}">
                  </div>
                  
                  <div class="col-md-4">
                    <label for="search" class="form-label small mb-1">Search</label>
                    <input type="text" name="search" id="search" class="form-control form-control-sm" 
                           placeholder="Search workshops..." value="{{ request('search') }}">
                  </div>
                  
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mb-1">
                      <i class="fa fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('events') }}" class="btn btn-sm btn-dark w-100">
                      <i class="fa fa-refresh"></i> Clear
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          @forelse($workshops as $workshop)
            <div class="col-md-4 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="{{ route('events.show', $workshop->slug) }}" class="block-20" 
                   style="background-image: url('{{ $workshop->main_image ? asset('storage/' . $workshop->main_image) : asset('front-end/images/workshop-1.jpg') }}');">
                </a>
                <div class="text p-4 d-block">
                  <div class="meta mb-3">
                    <div><a href="#">{{ $workshop->formatted_date }}</a></div>
                    <div>
                      @if($workshop->type)
                        <span class="badge badge-info">{{ ucfirst($workshop->type) }}</span>
                      @endif
                      @if($workshop->source)
                        <span class="badge badge-{{ $workshop->source == 'internal' ? 'primary' : 'warning' }}">
                          {{ $workshop->source == 'internal' ? 'Internal' : 'External' }}
                        </span>
                      @endif
                      <span class="badge badge-{{ $workshop->status_badge_class }}">{{ ucfirst($workshop->status) }}</span>
                    </div>
                  </div>
                  <h3 class="heading mb-4">
                    <a href="{{ route('events.show', $workshop->slug) }}">{{ $workshop->title }}</a>
                  </h3>
                  <p class="time-loc">
                    <span class="mr-2"><i class="icon-clock-o"></i> {{ $workshop->formatted_time_range }}</span> 
                    <span><i class="icon-map-o"></i> {{ $workshop->location }}</span>
                    @if($workshop->organizer)
                      <span class="ml-2"><i class="icon-user"></i> {{ $workshop->organizer }}</span>
                    @endif
                  </p>
                  @if($workshop->is_registration_open && $workshop->application_link)
                    <p class="mb-2">
                      <a href="{{ $workshop->application_link }}" target="_blank" class="btn btn-sm btn-success">
                        <i class="icon-link"></i> Register Now
                      </a>
                    </p>
                  @elseif($workshop->application_link && $workshop->status == 'open')
                    <p class="mb-2">
                      <a href="{{ $workshop->application_link }}" target="_blank" class="btn btn-sm btn-primary">
                        <i class="icon-link"></i> Apply Now
                      </a>
                    </p>
                  @endif
                  @if($workshop->overview)
                    <p>{{ Str::limit($workshop->overview, 120) }}</p>
                  @endif
                  
                  @if($workshop->total_participants > 0)
                    <div class="mb-2">
                      <small class="text-muted">
                        <strong>{{ $workshop->total_participants }}</strong> participants 
                        @if($workshop->girls_participation > 0)
                          | <span class="text-success">{{ $workshop->girls_participation_percentage }}% girls</span>
                        @endif
                      </small>
                    </div>
                  @endif
                  
                  @if($workshop->tags->count() > 0)
                    <div class="mb-3">
                      @foreach($workshop->tags as $tag)
                        <span class="badge badge-secondary">{{ $tag->name }}</span>
                      @endforeach
                    </div>
                  @endif
                  
                  <p><a href="{{ route('events.show', $workshop->slug) }}">View Details <i class="ion-ios-arrow-forward"></i></a></p>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <div class="alert alert-info text-center">
                <h5>No workshops found</h5>
                <p class="mb-0">Check back later for upcoming STEM workshops!</p>
              </div>
            </div>
          @endforelse
        </div>
        
        @if($workshops->hasPages())
          <div class="row mt-5">
            <div class="col text-center">
              <div class="block-27">
                <ul>
                  @if ($workshops->onFirstPage())
                    <li class="disabled"><span>&lt;</span></li>
                  @else
                    <li><a href="{{ $workshops->previousPageUrl() }}">&lt;</a></li>
                  @endif

                  @foreach ($workshops->getUrlRange(1, $workshops->lastPage()) as $page => $url)
                    @if ($page == $workshops->currentPage())
                      <li class="active"><span>{{ $page }}</span></li>
                    @else
                      <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                  @endforeach

                  @if ($workshops->hasMorePages())
                    <li><a href="{{ $workshops->nextPageUrl() }}">&gt;</a></li>
                  @else
                    <li class="disabled"><span>&gt;</span></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        @endif
      </div>
    </section>
		

</x-landing-layout>