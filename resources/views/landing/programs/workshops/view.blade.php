<x-landing-layout>
    <div class="hero-wrap2" style="background-image: url({{ asset('front-end/images/hero_bg.jpg') }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span class="mr-2"><a href="{{ route('events') }}">Workshops</a></span> <span>Workshop Details</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Workshop Details</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            
            <!-- Workshop/Event Title and Overview -->
            <h2 class="mb-3">{{ $workshop->title }}</h2>
            <div class="meta mb-4">
              <div class="d-flex align-items-center mb-3 flex-wrap">
                @if($workshop->type)
                  <span class="mr-3 mb-2"><i class="icon-tag"></i> {{ ucfirst($workshop->type) }}</span>
                @endif
                <span class="mr-3 mb-2"><i class="icon-calendar"></i> {{ $workshop->formatted_date }}</span>
                <span class="mr-3 mb-2"><i class="icon-clock-o"></i> {{ $workshop->formatted_time_range }}</span>
                <span class="mr-3 mb-2"><i class="icon-map-o"></i> {{ $workshop->location }}</span>
                @if($workshop->organizer)
                  <span class="mr-3 mb-2"><i class="icon-user"></i> {{ $workshop->organizer }}</span>
                @endif
                @if($workshop->source)
                  <span class="mr-3 mb-2">
                    <span class="badge badge-{{ $workshop->source == 'internal' ? 'primary' : 'info' }}">
                      {{ $workshop->source == 'internal' ? 'Internal' : 'External' }}
                    </span>
                  </span>
                @endif
              </div>
              @if($workshop->status)
                <span class="badge badge-{{ $workshop->status_badge_class }}">{{ ucfirst($workshop->status) }}</span>
              @endif
              @if($workshop->is_registration_open && $workshop->application_link)
                <a href="{{ $workshop->application_link }}" target="_blank" class="btn btn-primary btn-sm ml-2">
                  <i class="icon-link"></i> Register Now
                </a>
              @elseif($workshop->application_link && $workshop->status == 'open')
                <a href="{{ $workshop->application_link }}" target="_blank" class="btn btn-primary btn-sm ml-2">
                  <i class="icon-link"></i> Apply Now
                </a>
              @endif
            </div>
            
            @if($workshop->registration_open_date || $workshop->registration_close_date)
              <div class="alert alert-info mb-4">
                @if($workshop->registration_open_date)
                  <strong>Registration Opens:</strong> {{ $workshop->registration_open_date->format('F d, Y h:i A') }}<br>
                @endif
                @if($workshop->registration_close_date)
                  <strong>Registration Closes:</strong> {{ $workshop->registration_close_date->format('F d, Y h:i A') }}
                @endif
              </div>
            @endif
            
            @if($workshop->overview)
              <p>{{ $workshop->overview }}</p>
            @endif
            
            @if($workshop->main_image)
              <p>
                <img src="{{ asset('storage/' . $workshop->main_image) }}" alt="{{ $workshop->title }}" class="img-fluid">
              </p>
            @endif
            
            @if($workshop->what_we_learned)
              <h3 class="mb-3 mt-5">What We Learned</h3>
              <p>{{ $workshop->what_we_learned }}</p>
            @endif
            
            <!-- Gallery of What We Learned -->
            @if($workshop->galleries->count() > 0)
              <div class="row mt-4 mb-5">
                @foreach($workshop->galleries as $gallery)
                  <div class="col-md-6 mb-3">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                         alt="{{ $gallery->caption ?? 'Workshop gallery' }}" 
                         class="img-fluid rounded">
                    @if($gallery->caption)
                      <p class="text-muted small mt-2">{{ $gallery->caption }}</p>
                    @endif
                  </div>
                @endforeach
              </div>
            @endif
            
            <!-- Participation & Attendance -->
            @if($workshop->total_participants > 0 || $workshop->girls_participation > 0 || $workshop->attendance_rate > 0 || $workshop->schools_represented > 0)
              <div class="bg-light p-4 rounded mb-5">
                <h3 class="mb-4 text-primary">Participation & Attendance</h3>
                <div class="row">
                  @if($workshop->total_participants > 0)
                    <div class="col-md-6 mb-3">
                      <h5><strong>Total Participants:</strong> {{ $workshop->total_participants }} students</h5>
                    </div>
                  @endif
                  @if($workshop->girls_participation > 0)
                    <div class="col-md-6 mb-3">
                      <h5><strong>Girls Participation:</strong> {{ $workshop->girls_participation }} ({{ $workshop->girls_participation_percentage }}%)</h5>
                    </div>
                  @endif
                  @if($workshop->attendance_rate > 0)
                    <div class="col-md-6 mb-3">
                      <h5><strong>Attendance Rate:</strong> {{ $workshop->attendance_rate }}%</h5>
                    </div>
                  @endif
                  @if($workshop->schools_represented > 0)
                    <div class="col-md-6 mb-3">
                      <h5><strong>Schools Represented:</strong> {{ $workshop->schools_represented }} schools</h5>
                    </div>
                  @endif
                </div>
              </div>
            @endif
            
            <!-- Testimonials -->
            @if($workshop->testimonials->count() > 0)
              <div class="mt-5 mb-5">
                <h3 class="mb-4">Testimonials</h3>
                
                @foreach($workshop->testimonials as $testimonial)
                  <div class="testimonial p-4 bg-light rounded mb-4">
                    <div class="d-flex align-items-center mb-3">
                      @if($testimonial->image)
                        <div class="bio mr-4">
                          <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" 
                               class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                      @endif
                      <div>
                        <h5 class="mb-1">{{ $testimonial->name }}</h5>
                        <p class="text-muted mb-0">{{ $testimonial->role }}{{ $testimonial->school ? ', ' . $testimonial->school : '' }}</p>
                      </div>
                    </div>
                    <p class="mb-0">"{{ $testimonial->testimonial }}"</p>
                  </div>
                @endforeach
              </div>
            @endif
            
            <!-- Beneficiaries Gallery -->
            @if($workshop->beneficiaries->count() > 0)
              <div class="mt-5">
                <h3 class="mb-4">Our Beneficiaries</h3>
                <p>Meet some of the amazing students who participated in this workshop and are now pursuing their dreams in STEM fields.</p>
                
                <div class="row mt-4">
                  @foreach($workshop->beneficiaries as $beneficiary)
                    <div class="col-md-4 mb-4">
                      <div class="beneficiary-card text-center">
                        @if($beneficiary->image)
                          <img src="{{ asset('storage/' . $beneficiary->image) }}" alt="{{ $beneficiary->name }}" 
                               class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                          <div class="rounded-circle mb-3 mx-auto bg-secondary d-flex align-items-center justify-content-center" 
                               style="width: 200px; height: 200px;">
                            <span class="text-white" style="font-size: 48px;">{{ substr($beneficiary->name, 0, 1) }}</span>
                          </div>
                        @endif
                        <h5>{{ $beneficiary->name }}</h5>
                        @if($beneficiary->future_aspiration)
                          <p class="text-muted">{{ $beneficiary->future_aspiration }}</p>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endif
            
            <!-- Tags -->
            @if($workshop->tags->count() > 0)
              <div class="tag-widget post-tag-container mb-5 mt-5">
                <div class="tagcloud">
                  @foreach($workshop->tags as $tag)
                    <a href="{{ route('workshops', ['tag' => $tag->slug]) }}" class="tag-cloud-link">{{ $tag->name }}</a>
                  @endforeach
                </div>
              </div>
            @endif

          </div> <!-- .col-md-8 -->
          
          <!-- Sidebar -->
          <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="{{ route('events') }}" method="GET" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" name="search" class="form-control" placeholder="Search workshops...">
                </div>
              </form>
            </div>
            
            <div class="sidebar-box ftco-animate">
              <h3>Workshop Information</h3>
              <ul class="list-unstyled">
                <li class="mb-3"><strong>Date:</strong> {{ $workshop->formatted_date }}</li>
                <li class="mb-3"><strong>Time:</strong> {{ $workshop->formatted_time_range }}</li>
                <li class="mb-3"><strong>Location:</strong> {{ $workshop->location }}</li>
                @if($workshop->duration)
                  <li class="mb-3"><strong>Duration:</strong> {{ $workshop->duration }}</li>
                @endif
                @if($workshop->total_participants > 0)
                  <li class="mb-3"><strong>Participants:</strong> {{ $workshop->total_participants }} students</li>
                @endif
                <li><strong>Status:</strong> <span class="badge badge-{{ $workshop->status_badge_class }}">{{ ucfirst($workshop->status) }}</span></li>
              </ul>
            </div>

            @if($recentWorkshops->count() > 0)
              <div class="sidebar-box ftco-animate">
                <h3>Recent Workshops</h3>
                @foreach($recentWorkshops as $recentWorkshop)
                  <div class="block-21 mb-4 d-flex">
                    <a href="{{ route('events.show', $recentWorkshop->slug) }}" class="blog-img mr-4" 
                       style="background-image: url({{ $recentWorkshop->main_image ? asset('storage/' . $recentWorkshop->main_image) : asset('front-end/images/workshop-1.jpg') }});"></a>
                    <div class="text">
                      <h3 class="heading"><a href="{{ route('events.show', $recentWorkshop->slug) }}">{{ $recentWorkshop->title }}</a></h3>
                      <div class="meta">
                        <div><a href="{{ route('events.show', $recentWorkshop->slug) }}">
                          <span class="icon-calendar"></span> {{ $recentWorkshop->formatted_date }}
                        </a></div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif

            @if($workshop->tags->count() > 0)
              <div class="sidebar-box ftco-animate">
                <h3>Workshop Tags</h3>
                <ul class="categories">
                  @foreach($workshop->tags as $tag)
                    <li><a href="{{ route('workshops', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>

        </div>
      </div>
    </section> <!-- .section -->

 </x-landing-layout>

