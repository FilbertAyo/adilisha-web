<x-landing-layout>

  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="{{ route('impact.stories') }}">Success Stories</a></span>
            <span>{{ $story->name }}</span>
          </p>
          <h2 class="mb-3 bread text-white" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $story->title }}</h2>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="ftco-animate">
            <!-- Story Header -->
            <div class="mb-4">
              <div class="d-flex align-items-center mb-3">
                <img src="{{ $story->profile_picture ? asset('storage/' . $story->profile_picture) : asset('front-end/images/success-1.jpg') }}" 
                     alt="{{ $story->name }}" 
                     class="rounded-circle mr-3" 
                     style="width: 80px; height: 80px; object-fit: cover;">
                <div>
                  <h3 class="mb-1">{{ $story->name }}</h3>
                  <p class="mb-0">
                    <span class="icon-location-arrow mr-2"></span>{{ $story->location }}
                    <span class="ml-3 badge badge-primary">{{ ucfirst($story->category) }}</span>
                  </p>
                </div>
              </div>
            </div>

            <!-- Story Content -->
            <div class="story-content mb-5">
              {!! $story->content !!}
            </div>

            <!-- Story Images -->
            @if($story->image_1 || $story->image_2)
              <div class="row mb-5">
                @if($story->image_1)
                  <div class="col-md-{{ $story->image_2 ? '6' : '12' }} mb-4">
                    <img src="{{ asset('storage/' . $story->image_1) }}" 
                         alt="{{ $story->name }}" 
                         class="img-fluid rounded">
                  </div>
                @endif
                @if($story->image_2)
                  <div class="col-md-6 mb-4">
                    <img src="{{ asset('storage/' . $story->image_2) }}" 
                         alt="{{ $story->name }}" 
                         class="img-fluid rounded">
                  </div>
                @endif
              </div>
            @endif

            <!-- Share Section -->
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="{{ route('impact.stories') }}" class="tag-cloud-link">Back to Stories</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 sidebar ftco-animate">
          
          <!-- Related Stories -->
          @if($relatedStories->count() > 0)
            <div class="sidebar-box ftco-animate">
              <h3>Related Stories</h3>
              @foreach($relatedStories as $related)
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" 
                     style="background-image: url('{{ $related->profile_picture ? asset('storage/' . $related->profile_picture) : asset('front-end/images/success-1.jpg') }}');"></a>
                  <div class="text">
                    <h3 class="heading">
                      <a href="{{ route('impact.stories.show', $related->id) }}">{{ $related->title }}</a>
                    </h3>
                    <div class="meta">
                      <div><span class="icon-location-arrow"></span> {{ $related->location }}</div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          <!-- Categories -->
          <div class="sidebar-box ftco-animate">
            <h3>Story Categories</h3>
            <ul class="categories">
              <li><a href="{{ route('impact.stories', ['category' => 'student']) }}">Student Stories</a></li>
              <li><a href="{{ route('impact.stories', ['category' => 'teacher']) }}">Teacher Stories</a></li>
              <li><a href="{{ route('impact.stories', ['category' => 'community']) }}">Community Impact</a></li>
            </ul>
          </div>

          <!-- Call to Action -->
          <div class="sidebar-box ftco-animate">
            <h3>Support Our Mission</h3>
            <p>Help us create more success stories by supporting our STEM programs.</p>
            <p>
              <a href="{{ route('donations') }}" class="btn btn-primary btn-block">Donate Now</a>
            </p>
          </div>

        </div>
      </div>
    </div>
  </section>

</x-landing-layout>

