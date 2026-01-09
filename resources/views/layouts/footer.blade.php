<footer class="ftco-footer ftco-section img">
  <div class="overlay"></div>
  <div class="container">

    <div class="row mb-5">

      <!-- About Adilisha -->
      <div class="col-md-3">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">About Adilisha</h2>
          <p>
            Adilisha Youth and Child Development Organization empowers children,
            especially girls, to thrive in STEM education through hands-on learning,
            leadership, and community-driven programs guided by Agenda 2049.
          </p>

          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-4">
            <li class="ftco-animate">
              <a href="https://www.instagram.com/adilishatz/" target="_blank" rel="noopener">
                <span class="icon-instagram"></span>
              </a>
            </li>
            <li class="ftco-animate">
              <a href="https://www.tiktok.com/@adilishastemlab" target="_blank" rel="noopener">
                <span class="icon-tiktok"></span>
              </a>
            </li>
            <li class="ftco-animate">
              <a href="https://www.linkedin.com/company/78853309/admin/dashboard/" target="_blank" rel="noopener">
                <span class="icon-linkedin"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Recent Blogs -->
      <div class="col-md-4">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Recent Blog</h2>

          @forelse($recentBlogs as $blog)
            <div class="block-21 mb-4 d-flex">
              <a href="{{ route('blog.show', $blog->slug) }}" class="blog-img mr-4"
                 style="background-image: url('{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('front-end/images/image_1.jpg') }}');"></a>
              <div class="text">
                <h3 class="heading">
                  <a href="{{ route('blog.show', $blog->slug) }}">
                    {{ \Illuminate\Support\Str::limit($blog->title, 50) }}
                  </a>
                </h3>
                <div class="meta">
                  <div>
                    <a href="#"><span class="icon-calendar"></span> {{ $blog->published_at->format('M Y') }}</a>
                  </div>
                  <div>
                    <a href="#"><span class="icon-person"></span> {{ $blog->author_name }}</a>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4"
                 style="background-image: url('{{ asset('front-end/images/image_1.jpg') }}');"></a>
              <div class="text">
                <h3 class="heading">
                  <a href="#">
                    No recent blog posts
                  </a>
                </h3>
                <div class="meta">
                  <div>
                    <a href="#"><span class="icon-calendar"></span> -</a>
                  </div>
                </div>
              </div>
            </div>
          @endforelse

        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Quick Links</h2>
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}" class="py-2 d-block">Home</a></li>
            <li><a href="{{ route('about-us') }}" class="py-2 d-block">About Us</a></li>
            <li><a href="{{ route('programs.chomoza') }}" class="py-2 d-block">Programs</a></li>
            <li><a href="{{ route('impact.stories') }}" class="py-2 d-block">Impact</a></li>
            <li><a href="{{ route('blog') }}" class="py-2 d-block">Blog</a></li>
            <li><a href="{{ route('contact') }}" class="py-2 d-block">Contact Us</a></li>
          </ul>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-md-3">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Contact Us</h2>

          <div class="block-23 mb-3">
            <ul>
              <li>
                <span class="icon icon-map-marker"></span>
                <span class="text">
                  Bondeni Street, Mwanza, Tanzania
                </span>
              </li>
              <li>
                <a href="tel:+255282561724">
                  <span class="icon icon-phone"></span>
                  <span class="text">+255 28 256 1724</span>
                </a>
              </li>
              <li>
                <a href="mailto:info@adilisha.or.tz">
                  <span class="icon icon-envelope"></span>
                  <span class="text">info@adilisha.or.tz</span>
                </a>
              </li>
              <li>
                <span class="icon icon-clock-o"></span>
                <span class="text">Mon – Sat: 08:00 AM – 05:00 PM</span>
              </li>
            </ul>
          </div>

        </div>
      </div>

    </div>

    <!-- Footer Bottom -->
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0">
          &copy;
          <script>document.write(new Date().getFullYear());</script>
          Adilisha Youth and Child Development Organization. All Rights Reserved.
        </p>
      </div>
    </div>

  </div>
</footer>
