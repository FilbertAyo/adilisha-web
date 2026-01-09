<x-landing-layout>
    
    @include('partials.hero')
    @include('partials.actions')

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      
      <div class="col-md-6 d-flex ftco-animate">
        <div class="img img-about align-self-stretch" 
             style="background-image: url(front-end/images/about_img.jpg); width: 100%;">
        </div>
      </div>

      <div class="col-md-6 pl-md-5 ftco-animate">
        <h2 class="mb-4">About Adilisha</h2>

        <p>
          Adilisha Youth and Child Development Organization is a Tanzania-based NGO
          empowering children—especially girls—to succeed in STEM education and leadership.
          We work with schools, teachers, and communities to deliver hands-on STEM learning
          through the VUTAMDOGO and CHOMOZA programs.
        </p>

        <p>
          Guided by the 
          <a href="{{ route('agenda-2049') }}" class="text-primary font-weight-bold">
            Adilisha Agenda 2049
          </a>,
          we are committed to closing the gender gap in technology and equipping millions
          of young people with skills for the digital economy and future innovation.
        </p>

        <p>
          <a href="{{ route('about-us') }}" class="btn btn-primary px-4 py-2 mt-2">
            Read More
          </a>
        </p>
      </div>

    </div>
  </div>
</section>


<section>
  <div class="container">
    <div class="row">

      <!-- Mission -->
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 d-flex services p-3 py-4 d-block">
          <div class="icon d-flex mb-3">
            <span class="icon-clock-o text-primary" style="font-size: 50px;"></span>
          </div>
          <div class="media-body pl-4">
            <h3 class="heading">Our Mission</h3>
            <p>
              To empower children—especially girls—with practical STEM skills,
              leadership, and confidence to thrive in education and future careers.
            </p>
          </div>
        </div>      
      </div>

      <!-- Vision -->
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 d-flex services p-3 py-4 d-block">
        <div class="icon d-flex mb-3">
            <span class="icon-eye text-primary" style="font-size: 50px;"></span>
          </div>
          <div class="media-body pl-4">
            <h3 class="heading">Our Vision</h3>
            <p>
              A world where technology creation and use is gender-neutral,
              and every child has equal opportunity to learn, innovate, and lead.
            </p>
          </div>
        </div>      
      </div>

      <!-- Values -->
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 d-flex services p-3 py-4 d-block">
        <div class="icon d-flex mb-3">
            <span class="icon-star text-primary" style="font-size: 50px;"></span>
          </div>
          <div class="media-body pl-4">
            <h3 class="heading">Our Values</h3>
            <p>
              Equity in education, innovation through learning, community collaboration,
              integrity, and long-term impact guided by Adilisha Agenda 2049.
            </p>
          </div>
        </div>    
      </div>

    </div>
  </div>
</section>


   @include('partials.areas')

  @include('partials.story')

  @include('partials.photos')

  @include('partials.blogs')

  <section class="ftco-section bg-primary">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8 ftco-animate">
          <h2 class="text-white mb-3">Join Us in Empowering the Next Generation</h2>
          <p class="text-white mb-0" style="opacity: 0.9;">
            Your support helps us reach more children, train more teachers, and build more STEM labs 
            across Tanzania. Together, we can close the gender gap in technology and create equal 
            opportunities for every child to learn, innovate, and lead.
          </p>
        </div>
        <div class="col-md-4 text-md-right ftco-animate">
          <a href="{{ route('donations') }}" class="btn btn-white btn-lg px-5 py-3">
            Donate Now
          </a>
        </div>
      </div>
    </div>
  </section>

   @include('partials.events_list')

    <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center ftco-animate">
          <h3 class="mb-4">Subscribe to Our Mailing List</h3>
          <p>
            Get the latest publications, research findings, and resources delivered 
            directly to your inbox.
          </p>
          <form action="#" class="subscribe-form mt-4">
            <div class="form-group d-flex">
              <input type="email" class="form-control" placeholder="Enter your email address" required>
              <button type="submit" class="btn btn-primary px-4">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

</x-landing-layout>
