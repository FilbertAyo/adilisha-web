<x-landing-layout>

  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="#">Impact</a></span>
            <span>Success Stories</span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Success Stories</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Inspiring Stories of Change</h2>
          <p>
            Meet the students, teachers, and communities whose lives have been transformed 
            through Adilisha's STEM programs.
          </p>
        </div>
      </div>

      <div class="row">
        @forelse($stories as $story)
          <div class="col-md-6 col-lg-4 d-flex mb-4 ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="{{ route('impact.stories.show', $story->id) }}" class="block-20" 
                 style="background-image: url('{{ $story->profile_picture && file_exists(public_path('storage/' . $story->profile_picture)) ? asset('storage/' . $story->profile_picture) : asset($story->profile_picture ?? 'front-end/images/success-1.jpg') }}');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <div>
                    <span class="icon-location-arrow mr-2"></span>{{ $story->location }}
                  </div>
                  <div>
                    <span class="icon-tag mr-2"></span>
                    <span class="badge badge-primary">{{ ucfirst($story->category) }}</span>
                  </div>
                </div>
                <h3 class="heading mb-3">
                  <a href="{{ route('impact.stories.show', $story->id) }}">{{ $story->title }}</a>
                </h3>
                <p class="mb-3"><strong>{{ $story->name }}</strong></p>
                <p>{{ $story->excerpt }}</p>
                <a href="{{ route('impact.stories.show', $story->id) }}" class="btn btn-primary btn-sm">
                  Read Full Story
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center">
            <p>No success stories available at the moment.</p>
          </div>
        @endforelse
      </div>

      @if($stories->hasPages())
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                {{-- Previous Page Link --}}
                @if ($stories->onFirstPage())
                  <li class="disabled"><span>&lt;</span></li>
                @else
                  <li><a href="{{ $stories->previousPageUrl() }}">&lt;</a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($stories->getUrlRange(1, $stories->lastPage()) as $page => $url)
                  @if ($page == $stories->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                  @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($stories->hasMorePages())
                  <li><a href="{{ $stories->nextPageUrl() }}">&gt;</a></li>
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

