<x-landing-layout>

  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="#">Resources</a></span>
            <span>Gallery</span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Photo Gallery</h1>
        </div>
      </div>
    </div>
  </div>

  @include('partials.photos')

  <section class="ftco-section bg-light">
  <div class="container">

    <div class="row justify-content-center mb-4">
      <div class="col-md-8 text-center ftco-animate">
        <h2 class="mb-4">Gallery Categories</h2>
        @if($categoryId)
          <p class="mb-0">
            <a href="{{ route('resources.gallery') }}" class="btn btn-sm btn-outline-primary">
              <i class="icon-arrow-left mr-1"></i> View All Categories
            </a>
          </p>
        @endif
      </div>
    </div>

    <div class="row">
      @foreach($categories as $category)
        <div class="col-md-4 ftco-animate mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">
                <a href="{{ route('resources.gallery', ['category' => $category->id]) }}" class="text-dark">
                  {{ $category->name }}
                </a>
              </h5>
              <p class="card-text">
                {{ $category->description ?? '' }}
              </p>
            </div>
            <div class="card-footer bg-transparent border-0">
              <a href="{{ route('resources.gallery', ['category' => $category->id]) }}" class="btn btn-primary btn-sm">
                View Album ({{ $categoryCounts[$category->id] ?? 0 }} {{ ($categoryCounts[$category->id] ?? 0) == 1 ? 'photo' : 'photos' }})
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

  <section class="ftco-section bg-primary text-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center ftco-animate">
          <h3 class="mb-4 text-white">Want More Photos?</h3>
          <p>
            Follow us on social media for daily updates and behind-the-scenes moments from 
            our STEM programs and community activities.
          </p>
          <div class="mt-4">
            <a href="https://www.instagram.com/adilishatz/" target="_blank" class="btn btn-danger btn-lg px-4 py-3 mr-2 mb-2">
              <i class="icon-instagram mr-2"></i>Instagram
            </a>
            <a href="https://www.tiktok.com/@adilishastemlab" target="_blank" class="btn btn-dark btn-lg px-4 py-3 mr-2 mb-2">
              <i class="icon-tiktok mr-2"></i>TikTok
            </a>
            <a href="https://www.linkedin.com/company/78853309/admin/dashboard/" target="_blank" class="btn btn-primary btn-lg px-4 py-3 mb-2">
              <i class="icon-linkedin mr-2"></i>LinkedIn
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</x-landing-layout>
