@php
  // Check if we're on the gallery page (has categories variable) or welcome page (has featuredGalleries)
  $isGalleryPage = isset($categories);
  $isWelcomePage = isset($featuredGalleries);
  
  if ($isGalleryPage) {
    $galleriesToShow = $galleries ?? collect();
    $showAll = true;
  } elseif ($isWelcomePage) {
    $galleriesToShow = $featuredGalleries ?? collect();
    $showAll = false;
  } else {
    $galleriesToShow = collect();
    $showAll = false;
  }
@endphp

@if($isGalleryPage || ($isWelcomePage && $galleriesToShow->count() > 0))
@if(!$isWelcomePage && $galleriesToShow->count() > 0)
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">
         
            @if($isGalleryPage && isset($categoryId) && $categoryId)
              @php
                $selectedCategory = $categories->firstWhere('id', $categoryId);
              @endphp
              @if($selectedCategory)
                {{ $selectedCategory->name }} - Gallery
              @else
                Our Journey in Pictures
              @endif
            @else
              Our Journey in Pictures
            @endif
           
          </h2>
          <p>
            @if($isGalleryPage && isset($categoryId) && $categoryId)
              @php
                $selectedCategory = $categories->firstWhere('id', $categoryId);
              @endphp
              @if($selectedCategory && $selectedCategory->description)
                {{ $selectedCategory->description }}
              @else
                Explore moments from our STEM programs, workshops, competitions, and community 
                events that capture the spirit of learning, innovation, and empowerment.
              @endif
            @else
              Explore moments from our STEM programs, workshops, competitions, and community 
              events that capture the spirit of learning, innovation, and empowerment.
            @endif
          </p>
         
        </div>
      </div>
    </div>
  </section>

  @endif

  @if($galleriesToShow->count() > 0)
    <section class="ftco-gallery bg-light">
      @php
        $chunks = $galleriesToShow->chunk(4); // Split into groups of 4
      @endphp
      @foreach($chunks as $chunk)
        <div class="d-md-flex">
          @foreach($chunk as $gallery)
            <a href="{{ asset('storage/' . $gallery->image_path) }}" 
               class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" 
               style="background-image: url('{{ asset('storage/' . $gallery->image_path) }}');"
               title="{{ $gallery->title ?? 'Gallery Image' }}"
               loading="lazy">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-search"></span>
              </div>
            </a>
          @endforeach
        </div>
      @endforeach
    </section>
  @else
    @if($isGalleryPage)
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center">
              <p class="text-muted">No gallery images available at the moment.</p>
            </div>
          </div>
        </div>
      </section>
    @endif
  @endif
@endif