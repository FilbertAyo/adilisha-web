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
          <a href="agenda-2049.html" class="text-primary font-weight-bold">
            Adilisha Agenda 2049
          </a>,
          we are committed to closing the gender gap in technology and equipping millions
          of young people with skills for the digital economy and future innovation.
        </p>

        <p>
          <a href="about.html" class="btn btn-primary px-4 py-2 mt-2">
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
        <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
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
        <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
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
        <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
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


    <section class="ftco-section bg-light">
  <div class="container-fluid">

    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-6 heading-section ftco-animate text-center">
        <h2 class="mb-4">Our Programs & Focus Areas</h2>
        <p>
          We deliver hands-on STEM education and leadership development through
          community-based programs aligned with the Adilisha Agenda 2049.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="carousel-cause owl-carousel">

          <!-- VUTAMDOGO -->
          <div class="item">
            <div class="cause-entry">
              <a href="#" class="img"
                 style="background-image: url({{ asset('front-end/images/vutamdogo.jpg') }});"></a>
              <div class="text p-3 p-md-4">
                <h3><a href="#">VUTAMDOGO STEM Project</a></h3>
                <p>
                  Introducing young learners to STEM through play-based,
                  practical activities that build curiosity and confidence.
                </p>
                <span class="donation-time mb-3 d-block">
                  Early STEM engagement for primary schools
                </span>
              </div>
            </div>
          </div>

          <!-- CHOMOZA -->
          <div class="item">
            <div class="cause-entry">
              <a href="{{ route('programs.chomoza') }}" class="img"
                 style="background-image: url({{ asset('front-end/images/chomoza.jpg') }});"></a>
              <div class="text p-3 p-md-4">
                <h3><a href="{{ route('programs.chomoza') }}">CHOMOZA STEM Project</a></h3>
                <p>
                  Empowering girls and youth with coding, robotics, and innovation
                  skills for secondary education and beyond.
                </p>
                <span class="donation-time mb-3 d-block">
                  Advanced STEM & leadership training
                </span>
              </div>
            </div>
          </div>

          <!-- STEM Workshops -->
          <div class="item">
            <div class="cause-entry">
              <a href="{{ route('workshops') }}" class="img"
                 style="background-image: url({{ asset('front-end/images/teachers-community.jpg') }});"></a>
              <div class="text p-3 p-md-4">
                <h3><a href="{{ route('workshops') }}">STEM Workshops & Training</a></h3>
                <p>
                  Comprehensive teacher training and capacity building programs
                  to deliver quality STEM education across Tanzania.
                </p>
                <span class="donation-time mb-3 d-block">
                  Empowering educators for sustainable impact
                </span>
              </div>
            </div>
          </div>

          <!-- STEM Labs -->
          <div class="item">
            <div class="cause-entry">
              <a href="#" class="img"
                 style="background-image: url({{ asset('front-end/images/stem-labs.jpg') }});"></a>
              <div class="text p-3 p-md-4">
                <h3><a href="#">STEM Labs & Innovation Spaces</a></h3>
                <p>
                  Supporting fully equipped STEM labs that enable practical
                  learning and real-world experimentation.
                </p>
                <span class="donation-time mb-3 d-block">
                  Vision: 3,904 schools by 2049
                </span>
              </div>
            </div>
          </div>

          <!-- Community Engagement -->
          <div class="item">
            <div class="cause-entry">
              <a href="#" class="img"
                 style="background-image: url({{ asset('front-end/images/about_img.jpg') }});"></a>
              <div class="text p-3 p-md-4">
                <h3><a href="#">Community Engagement</a></h3>
                <p>
                  Working with parents, leaders, and communities to create
                  supportive environments for children's STEM learning.
                </p>
                <span class="donation-time mb-3 d-block">
                  Building sustainable STEM ecosystems
                </span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>


    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Success Stories</h2>
            <p>
              Be inspired by real stories of children, teachers, and entire communities transformed through our STEM programs. These journeys showcase lifelong impact and the power of opportunity.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
              <div class="d-flex mb-4">
                <div class="img" style="background-image: url(front-end/images/success-1.jpg);"></div>
                <div class="info ml-4">
                  <h3><a href="#">Furaha's Journey</a></h3>
                  <span class="position">Dar es Salaam</span>
                  <div class="text">
                    <p>Furaha, a CHOMOZA alumna, founded her school's first robotics club and mentors new generations of girls in tech.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
              <div class="d-flex mb-4">
                <div class="img" style="background-image: url(front-end/images/success-2.jpg);"></div>
                <div class="info ml-4">
                  <h3><a href="#">Mr. Simon's STEM Classroom</a></h3>
                  <span class="position">Mwanza</span>
                  <div class="text">
                    <p>Teacher Simon used training from our workshops to introduce hands-on science, boosting student enthusiasm and achievement.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
            <div class="staff">
              <div class="d-flex mb-4">
                <div class="img" style="background-image: url(front-end/images/success-3.jpg);"></div>
                <div class="info ml-4">
                  <h3><a href="#">Kigoma Community Impact</a></h3>
                  <span class="position">Kigoma</span>
                  <div class="text">
                    <p>Entire villages came together to celebrate student-made projects at their first-ever community STEM Day, sparking excitement for education.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <a href="{{ route('impact.stories') }}" class="btn btn-primary btn-lg px-5 py-3">
            Read More
          </a>
        </div>
      </div>
    </section>
       

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

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Latest Events</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-1.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-2.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/event-3.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


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
