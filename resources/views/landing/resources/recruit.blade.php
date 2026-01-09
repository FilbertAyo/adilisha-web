<x-landing-layout>
   
    <div class="hero-wrap2" style="background-image: url({{ asset('front-end/images/hero_bg.jpg') }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Resources</span> <span>Recruitment Portal</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Recruitment Portal</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 ftco-animate">
            <div class="text-center py-5">
              <div class="mb-5">
                <span class="icon-times-circle text-warning" style="font-size: 120px; display: block; margin-bottom: 30px;"></span>
                <h2 class="mb-4 text-primary">Portal Currently Closed</h2>
                <p class="lead mb-4" style="font-size: 20px;" class="text-justify">
                  We appreciate your interest in joining the Adilisha team. 
                  Unfortunately, our recruitment portal is currently closed and we are not accepting new applications at this time.
                </p>
              </div>

              <div class="bg-light p-5 mb-5" style="border-radius: 10px; border-left: 5px solid #0d78b8;">
                <h3 class="mb-4 text-primary">No Opportunities Available</h3>
                <p style="line-height: 1.8;" class="text-justify">
                  We are currently not recruiting for any open positions. Please check back later for future opportunities, 
                  or feel free to explore our <a href="{{ route('resources.carrier') }}" class="text-primary font-weight-bold">Career Opportunities</a> page to learn more about 
                  the types of roles we typically offer and our organization's values and policies.
                </p>
              </div>

              <div class="row mt-5">
                <div class="col-md-6 mb-4 ftco-animate">
                  <div class="media block-6 d-flex services p-4 d-block" style="background: #f8f9fa; border-radius: 10px; height: 100%;">
                    <div class="media-body">
                      <h3 class="heading mb-3">Stay Updated</h3>
                      <p>Follow us on social media or subscribe to our newsletter to receive notifications when new positions become available.</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4 ftco-animate">
                  <div class="media block-6 d-flex services p-4 d-block" style="background: #f8f9fa; border-radius: 10px; height: 100%;">
                    <div class="media-body">
                      <h3 class="heading mb-3">Volunteer Opportunities</h3>
                      <p>Interested in volunteering? We welcome volunteers throughout the year. Please contact us directly for volunteer opportunities.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-5">
                <h4 class="mb-4 text-primary">Alternative Ways to Connect</h4>
                <div class="row text-left">
                  <div class="col-md-6 mb-3">
                    <p class="text-justify">
                      <strong class='text-primary'>General Inquiries:</strong><br>
                      Contact us through our main contact channels for general information about our organization and future opportunities.
                    </p>
                  </div>
                  <div class="col-md-6 mb-3">
                    <p class="text-justify">
                      <strong  class='text-primary'>Partnerships:</strong><br>
                      If you're interested in partnering with us, please visit our <a href="{{ route('partnership') }}" class="text-primary">Partnership</a> page.
                    </p>
                  </div>
                </div>
              </div>

              <div class="mt-5 pt-4">
                <a href="{{ route('home') }}" class="btn btn-primary py-3 px-5 mr-3">Return to Home</a>
                <a href="{{ route('resources.carrier') }}" class="btn btn-outline-primary py-3 px-5">Learn About Careers</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    

</x-landing-layout>

