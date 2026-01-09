<x-landing-layout>
    
    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          @forelse($blogs as $blog)
            <div class="col-md-4 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="{{ route('blog.show', $blog->slug) }}" class="block-20" 
                   style="background-image: url('{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('front-end/images/image_1.jpg') }}');">
                </a>
                <div class="text p-4 d-block">
                  <div class="meta mb-3">
                    <div><a href="#">{{ $blog->published_at->format('M d, Y') }}</a></div>
                    <div><a href="#">{{ $blog->author_name }}</a></div>
                  </div>
                  <h3 class="heading mt-3">
                    <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                  </h3>
                  <p>{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 100) }}</p>
                </div>
              </div>
            </div>
          @empty
            <div class="col-md-12 text-center">
              <p class="text-muted">No blog posts available at the moment.</p>
            </div>
          @endforelse
        </div>

        @if($blogs->hasPages())
          <div class="row mt-5">
            <div class="col text-center">
              <div class="block-27">
                <ul>
                  {{-- Previous Page Link --}}
                  @if ($blogs->onFirstPage())
                    <li class="disabled"><span>&lt;</span></li>
                  @else
                    <li><a href="{{ $blogs->previousPageUrl() }}">&lt;</a></li>
                  @endif

                  {{-- Pagination Elements --}}
                  @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                    @if ($page == $blogs->currentPage())
                      <li class="active"><span>{{ $page }}</span></li>
                    @else
                      <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                  @endforeach

                  {{-- Next Page Link --}}
                  @if ($blogs->hasMorePages())
                    <li><a href="{{ $blogs->nextPageUrl() }}">&gt;</a></li>
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