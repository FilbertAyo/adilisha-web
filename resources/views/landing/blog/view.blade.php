<x-landing-layout>
    <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
               <span class="mr-2"><a href="{{ route('home') }}">Home</a></span> 
               <span class="mr-2"><a href="{{ route('blog') }}">Blog</a></span> 
               <span>Blog Details</span>
             </p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $blog->title }}</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">{{ $blog->title }}</h2>
            
            @if($blog->featured_image)
              <p>
                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid">
              </p>
            @endif

            @if($blog->excerpt)
              <p class="lead">{{ $blog->excerpt }}</p>
            @endif

            <div style="white-space: pre-wrap;">{{ $blog->content }}</div>
            
            <div class="about-author d-flex p-5 bg-light mt-5">
              @if($blog->author_image)
                <div class="bio align-self-md-center mr-5">
                  <img src="{{ asset('storage/' . $blog->author_image) }}" alt="{{ $blog->author_name }}" class="img-fluid mb-4 rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
              @endif
              <div class="desc align-self-md-center">
                <h5>{{ $blog->author_name }}</h5>
                @if($blog->author_position)
                  <p class="text-muted mb-2">{{ $blog->author_position }}</p>
                @endif
                <p class="mb-0">
                  <small class="text-muted">
                    Published on {{ $blog->published_at->format('F d, Y') }}
                  </small>
                </p>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            @if($recentBlogs->count() > 0)
              <div class="sidebar-box ftco-animate">
                <h3>Recent Blog Posts</h3>
                @foreach($recentBlogs as $recentBlog)
                  <div class="block-21 mb-4 d-flex">
                    <a href="{{ route('blog.show', $recentBlog->slug) }}" class="blog-img mr-4" 
                       style="background-image: url('{{ $recentBlog->featured_image ? asset('storage/' . $recentBlog->featured_image) : asset('front-end/images/image_1.jpg') }}');"></a>
                    <div class="text">
                      <h3 class="heading">
                        <a href="{{ route('blog.show', $recentBlog->slug) }}">{{ Str::limit($recentBlog->title, 60) }}</a>
                      </h3>
                      <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> {{ $recentBlog->published_at->format('M d, Y') }}</a></div>
                        <div><a href="#"><span class="icon-person"></span> {{ $recentBlog->author_name }}</a></div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif

            <div class="sidebar-box ftco-animate">
              <h3>About This Blog</h3>
              <p>Stay updated with the latest news, stories, and insights from Adilisha. Follow our journey in empowering communities through STEM education and innovation.</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

 </x-landing-layout>