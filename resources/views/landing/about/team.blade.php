<x-landing-layout>
    @push('head')
        @if($teams->isNotEmpty() && $teams->take(3)->filter(fn($t) => $t->profile_image)->isNotEmpty())
            @foreach($teams->take(3) as $team)
                @if($team->profile_image)
                    <link rel="preload" as="image" href="{{ asset('storage/' . $team->profile_image) }}">
                @endif
            @endforeach
        @endif
    @endpush

    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Our Team</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-8 heading-section ftco-animate text-center">
            <h2 class="mb-4">Meet Our Team</h2>
          </div>
        </div>

        <div class="row">
          @forelse($teams as $team)
            <div class="col-lg-4 col-md-6 d-flex mb-4 ftco-animate">
              <div class="staff w-100">
                <div class="img mb-4" style="position: relative; overflow: hidden; aspect-ratio: 1/1; background-color: #f8f9fa;">
                  <img 
                    src="{{ $team->profile_image ? asset('storage/' . $team->profile_image) : asset('front-end/images/person_1.jpg') }}" 
                    alt="{{ $team->name }}"
                    loading="lazy"
                    data-fallback="{{ asset('front-end/images/person_1.jpg') }}"
                    class="team-profile-img"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; opacity: 0;"
                  >
                </div>
                <div class="info text-center">
                  <h3><a href="#">{{ $team->name }}</a></h3>
                  <span class="position">{{ $team->position }}</span>
                  @if($team->description)
                    <div class="text mt-3">
                      <p>{{ $team->description }}</p>
                    </div>
                  @endif
                  @if($team->instagram || $team->linkedin || $team->email)
                    <div class="mt-3">
                      @if($team->email)
                        <a href="mailto:{{ $team->email }}" class="mx-2" title="Email"><span class="icon-envelope"></span></a>
                      @endif
                      @if($team->instagram)
                        <a href="{{ str_starts_with($team->instagram, 'http') ? $team->instagram : 'https://instagram.com/' . ltrim($team->instagram, '@') }}" target="_blank" class="mx-2" title="Instagram"><span class="icon-instagram"></span></a>
                      @endif
                      @if($team->linkedin)
                        <a href="{{ str_starts_with($team->linkedin, 'http') ? $team->linkedin : 'https://linkedin.com/in/' . $team->linkedin }}" target="_blank" class="mx-2" title="LinkedIn"><span class="icon-linkedin"></span></a>
                      @endif
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center">
              <p class="text-muted">No team members available at the moment.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
		
</x-landing-layout>
