<x-landing-layout>
    
    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Board of Directors</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-8 heading-section ftco-animate text-center">
            <h2 class="mb-4">Board of Directors</h2>
            <p>Our Board of Directors guides Adilisha, ensuring we empower youth through STEM education</p>
          </div>
        </div>

        <div class="row">
          @forelse($boards as $board)
            <div class="col-lg-4 col-md-6 d-flex mb-4 ftco-animate">
              <div class="staff w-100">
                <div class="img mb-4" style="background-image: url('{{ $board->profile_image ? asset('storage/' . $board->profile_image) : asset('front-end/images/person_1.jpg') }}'); background-size: cover; background-position: center; aspect-ratio: 1/1;"></div>
                <div class="info text-center">
                  <h3><a href="#">{{ $board->name }}</a></h3>
                  <span class="position">{{ $board->position }}</span>
                  @if($board->description)
                    <div class="text mt-3">
                      <p>{{ $board->description }}</p>
                    </div>
                  @endif
                  @if($board->instagram || $board->linkedin || $board->email)
                    <div class="mt-3">
                      @if($board->email)
                        <a href="mailto:{{ $board->email }}" class="mx-2" title="Email"><span class="icon-envelope"></span></a>
                      @endif
                      @if($board->instagram)
                        <a href="{{ str_starts_with($board->instagram, 'http') ? $board->instagram : 'https://instagram.com/' . ltrim($board->instagram, '@') }}" target="_blank" class="mx-2" title="Instagram"><span class="icon-instagram"></span></a>
                      @endif
                      @if($board->linkedin)
                        <a href="{{ str_starts_with($board->linkedin, 'http') ? $board->linkedin : 'https://linkedin.com/in/' . $board->linkedin }}" target="_blank" class="mx-2" title="LinkedIn"><span class="icon-linkedin"></span></a>
                      @endif
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center">
              <p class="text-muted">Board of Directors information coming soon.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
		
</x-landing-layout>
