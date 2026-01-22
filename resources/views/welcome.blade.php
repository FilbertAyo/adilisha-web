<x-landing-layout>
    
    @include('partials.hero')
    @include('partials.actions')



  @include('partials.story')



  <!-- <section class="ftco-section bg-primary">
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
  </section> -->

  @include('partials.areas')

</x-landing-layout>
