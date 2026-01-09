<x-landing-layout>

  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="#">Programs</a></span>
            <span>CHOMOZA</span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">CHOMOZA STEM Project</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row d-flex align-items-center">

        <div class="col-md-6 ftco-animate">
          <div class="img img-about align-self-stretch rounded"
               style="background-image: url({{ asset('front-end/images/agenda1.jpg') }}); width: 100%; height: 100%; min-height: 420px;">
          </div>
        </div>

        <div class="col-md-6 pl-md-5 ftco-animate">
          <h2 class="mb-4">CHOMOZA STEM Project</h2>

          <p>
            CHOMOZA is Adilisha's flagship secondary-level STEM program designed to empower 
            girls and youth with advanced skills in coding, robotics, innovation, and leadership.
          </p>

          <p>
            Through hands-on projects and mentorship, CHOMOZA creates pathways for young people 
            to pursue higher education and careers in science, technology, engineering, and mathematics.
          </p>

          <p class="text-primary font-weight-bold mb-0">
            Building the next generation of innovators and problem-solvers.
          </p>
        </div>

      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">What CHOMOZA Offers</h2>
          <p>Comprehensive STEM education and leadership development for secondary students</p>
        </div>
      </div>

      <div class="row">
        <!-- Coding & Programming -->
        <div class="col-md-4 d-flex ftco-animate">
          <div class="card media block-6 services p-4 py-md-5 d-block text-center">
            <div class="icon d-flex mb-3 justify-content-center">
              <span class="icon-laptop text-primary" style="font-size: 50px;"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Coding & Programming</h3>
              <p>
                Students learn Python, JavaScript, web development, and app creation 
                through practical projects and real-world challenges.
              </p>
            </div>
          </div>      
        </div>

        <!-- Robotics & Engineering -->
        <div class="col-md-4 d-flex ftco-animate">
          <div class="card media block-6 services p-4 py-md-5 d-block text-center">
            <div class="icon d-flex mb-3 justify-content-center">
              <span class="icon-cogs text-primary" style="font-size: 50px;"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Robotics & Engineering</h3>
              <p>
                Hands-on experience with robotics kits, Arduino, and electronics to 
                design and build functional prototypes.
              </p>
            </div>
          </div>      
        </div>

        <!-- Innovation Labs -->
        <div class="col-md-4 d-flex ftco-animate">
          <div class="card media block-6 services p-4 py-md-5 d-block text-center">
            <div class="icon d-flex mb-3 justify-content-center">
              <span class="icon-lightbulb-o text-primary" style="font-size: 50px;"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Innovation Labs</h3>
              <p>
                Safe spaces where students collaborate on creative solutions to 
                community challenges using STEM skills.
              </p>
            </div>
          </div>    
        </div>

        <!-- Mentorship Programs -->
        <div class="col-md-4 d-flex ftco-animate">
          <div class="card media block-6 services p-4 py-md-5 d-block text-center">
            <div class="icon d-flex mb-3 justify-content-center">
              <span class="icon-users text-primary" style="font-size: 50px;"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Mentorship Programs</h3>
              <p>
                Connecting students with role models and professionals in STEM fields 
                for guidance and inspiration.
              </p>
            </div>
          </div>      
        </div>

        <!-- Leadership Training -->
        <div class="col-md-4 d-flex ftco-animate">
          <div class="card media block-6 services p-4 py-md-5 d-block text-center">
            <div class="icon d-flex mb-3 justify-content-center">
              <span class="icon-graduation-cap text-primary" style="font-size: 50px;"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Leadership Training</h3>
              <p>
                Developing confidence, public speaking, teamwork, and project management 
                skills essential for future leaders.
              </p>
            </div>
          </div>      
        </div>

        <!-- Competitions & Showcases -->
        <div class="col-md-4 d-flex ftco-animate">
          <div class="card media block-6 services p-4 py-md-5 d-block text-center">
            <div class="icon d-flex mb-3 justify-content-center">
              <span class="icon-trophy text-primary" style="font-size: 50px;"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Competitions & Showcases</h3>
              <p>
                Students present their innovations at local and national STEM competitions 
                and innovation fairs.
              </p>
            </div>
          </div>    
        </div>
        
      </div>
    </div>
  </section>



  @include('partials.actions')

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center ftco-animate">
          <h2 class="mb-4">Success Milestones</h2>
          <p>Real achievements from the CHOMOZA program</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 ftco-animate">
          <div class="cause-entry bg-white p-4 mb-4">
            <h3>More Girls Interested in Science</h3>
            <p>
              Participation in CHOMOZA has led to a significant increase in the number of girls showing interest in science subjects and STEM activities, both in and out of school.
            </p>
          </div>
        </div>

        <div class="col-md-6 ftco-animate">
          <div class="cause-entry bg-white p-4 mb-4">
            <h3>University Scholarships</h3>
            <p>
              Over 40 CHOMOZA alumni have secured scholarships to pursue STEM degrees 
              at universities in Tanzania and internationally.
            </p>
          </div>
        </div>

        <div class="col-md-6 ftco-animate">
          <div class="cause-entry bg-white p-4 mb-4">
            <h3>Community Solutions</h3>
            <p>
              Students developed mobile apps and IoT devices addressing local challenges 
              like agriculture, health, and education access.
            </p>
          </div>
        </div>

        <div class="col-md-6 ftco-animate">
          <div class="cause-entry bg-white p-4 mb-4">
            <h3>Girls in Tech Leadership</h3>
            <p>
              75% of CHOMOZA girls report increased confidence and interest in pursuing 
              STEM careers after completing the program.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

 

</x-landing-layout>

