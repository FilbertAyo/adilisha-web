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



@include('partials.mission')

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

   

</x-landing-layout>
