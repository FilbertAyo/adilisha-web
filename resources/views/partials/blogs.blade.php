<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">From Our Blog</h2>
        <p>
          Updates, stories, and insights from our STEM programs,
          community work, and Adilisha Agenda 2049 journey.
        </p>
      </div>
    </div>

    <div class="row d-flex">
      @forelse($recentBlogs as $blog)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="{{ route('blog.show', $blog->slug) }}" class="block-20"
               style="background-image: url('{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('front-end/images/image_1.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">{{ $blog->published_at->format('M Y') }}</a></div>
                <div><a href="#">{{ $blog->author_name }}</a></div>
              </div>
              <h3 class="heading mt-3">
                <a href="{{ route('blog.show', $blog->slug) }}">
                  {{ $blog->title }}
                </a>
              </h3>
              <p>
                {{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 100) }}
              </p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-md-12 text-center">
          <p class="text-muted">No blog posts available yet. Check back soon!</p>
        </div>
      @endforelse
    </div>

    @if($recentBlogs->count() > 0)
      <div class="row mt-4">
        <div class="col text-center">
          <a href="{{ route('blog') }}" class="btn btn-primary">View All Blog Posts</a>
        </div>
      </div>
    @endif
  </div>
</section>