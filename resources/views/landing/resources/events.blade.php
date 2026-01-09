<x-landing-layout>

  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="#">Resources</a></span>
            <span>Events</span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Our Events</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Upcoming Events</h2>
          <p>
            Join us at workshops, competitions, training sessions, and community events 
            as we empower the next generation of innovators.
          </p>
        </div>
      </div>

      <div class="row">
        
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20" style="background-image: url('{{ asset('images/event-1.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">March 15, 2026</a></div>
                <div><a href="#">CHOMOZA Program</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 12</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">National Robotics Competition 2026</a></h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 9:00AM-5:00PM</span>
                <span><i class="icon-map-o"></i> University of Dar es Salaam</span>
              </p>
              <p>
                CHOMOZA students showcase their robotics projects and compete for national 
                recognition. Open to secondary school teams across Tanzania.
              </p>
              <p><a href="#" class="btn btn-primary btn-sm">Register Now <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20" style="background-image: url('{{ asset('images/event-2.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">April 5-7, 2026</a></div>
                <div><a href="#">Teacher Training</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 8</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">STEM Teachers Workshop - Mwanza</a></h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 8:30AM-4:00PM</span>
                <span><i class="icon-map-o"></i> Mwanza Teachers College</span>
              </p>
              <p>
                Three-day intensive training on practical STEM pedagogy, hands-on activities, 
                and classroom management for effective learning.
              </p>
              <p><a href="#" class="btn btn-primary btn-sm">Apply Now <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20" style="background-image: url('{{ asset('images/event-3.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">May 20, 2026</a></div>
                <div><a href="#">Community Event</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 15</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">Girls in STEM Career Fair</a></h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 10:00AM-3:00PM</span>
                <span><i class="icon-map-o"></i> Mlimani City Conference Hall</span>
              </p>
              <p>
                Connecting young girls with women professionals in STEM fields. Mentorship sessions, 
                career talks, and interactive demonstrations.
              </p>
              <p><a href="#" class="btn btn-primary btn-sm">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20" style="background-image: url('{{ asset('front-end/images/vutamdogo.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">June 10, 2026</a></div>
                <div><a href="#">VUTAMDOGO Program</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 20</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">Primary School Science Fair - Dodoma</a></h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 9:00AM-2:00PM</span>
                <span><i class="icon-map-o"></i> Dodoma Regional Stadium</span>
              </p>
              <p>
                VUTAMDOGO students present science experiments and projects. Parents and community 
                members invited to celebrate young learners' achievements.
              </p>
              <p><a href="#" class="btn btn-primary btn-sm">Learn More <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20" style="background-image: url('{{ asset('front-end/images/stem-labs.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">July 18, 2026</a></div>
                <div><a href="#">Innovation Showcase</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 10</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">Tanzania Youth Innovation Summit</a></h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 8:00AM-6:00PM</span>
                <span><i class="icon-map-o"></i> Julius Nyerere Convention Centre</span>
              </p>
              <p>
                National platform for young innovators to present tech solutions addressing 
                community challenges. Prizes and mentorship opportunities available.
              </p>
              <p><a href="#" class="btn btn-primary btn-sm">Register Team <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20" style="background-image: url('{{ asset('front-end/images/chomoza.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">August 22-23, 2026</a></div>
                <div><a href="#">Coding Bootcamp</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 18</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">Girls Code Weekend - Arusha</a></h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 9:00AM-5:00PM</span>
                <span><i class="icon-map-o"></i> Arusha Tech Hub</span>
              </p>
              <p>
                Two-day intensive coding bootcamp for secondary school girls. Learn web development, 
                build apps, and connect with mentors. All skill levels welcome!
              </p>
              <p><a href="#" class="btn btn-primary btn-sm">Sign Up <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Past Events Highlights</h2>
          <p>
            Celebrating our successful events and the impact they've made on students, 
            teachers, and communities.
          </p>
        </div>
      </div>

      <div class="row">
        
        <div class="col-md-6 col-lg-3 ftco-animate mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 mr-3">
                  <i class="icon-trophy text-primary" style="font-size: 24px;"></i>
                </div>
                <small class="text-muted">Dec 12, 2025</small>
              </div>
              <h5 class="card-title mb-3">CHOMOZA Innovation Expo 2025</h5>
              <p class="card-text text-muted small">
                150+ students showcased robotics and IoT solutions. Winners received laptops and mentorship.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 ftco-animate mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 mr-3">
                  <i class="icon-users text-primary" style="font-size: 24px;"></i>
                </div>
                <small class="text-muted">Nov 5, 2025</small>
              </div>
              <h5 class="card-title mb-3">National Teacher Training</h5>
              <p class="card-text text-muted small">
                250+ teachers from 15 regions trained in practical STEM pedagogy and innovation.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 ftco-animate mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 mr-3">
                  <i class="icon-heart text-primary" style="font-size: 24px;"></i>
                </div>
                <small class="text-muted">Oct 18, 2025</small>
              </div>
              <h5 class="card-title mb-3">Community STEM Day</h5>
              <p class="card-text text-muted small">
                Parents and leaders celebrated STEM learning with experiments and project presentations.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 ftco-animate mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 mr-3">
                  <i class="icon-star text-primary" style="font-size: 24px;"></i>
                </div>
                <small class="text-muted">Sep 14, 2025</small>
              </div>
              <h5 class="card-title mb-3">Girls Robotics Challenge</h5>
              <p class="card-text text-muted small">
                12 all-girls teams competed. Winners earned a trip to Africa Robotics Championship.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center ftco-animate">
          <div class="bg-light p-5">
            <h3 class="mb-4">Host an Event with Adilisha</h3>
            <p>
              Is your school or organization interested in hosting a STEM workshop, training, 
              or competition? We'd love to collaborate!
            </p>
            <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-3 mt-3">Get in Touch</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center ftco-animate">
          <h2 class="mb-4">Event Calendar</h2>
          <p>Stay updated on all our upcoming activities</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
              <thead class="thead-primary">
                <tr>
                  <th>Date</th>
                  <th>Event</th>
                  <th>Location</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>March 15, 2026</td>
                  <td>National Robotics Competition</td>
                  <td>Dar es Salaam</td>
                  <td><span class="badge badge-primary">Competition</span></td>
                  <td><a href="#" class="btn btn-sm btn-outline-primary">Register</a></td>
                </tr>
                <tr>
                  <td>April 5-7, 2026</td>
                  <td>STEM Teachers Workshop</td>
                  <td>Mwanza</td>
                  <td><span class="badge badge-success">Training</span></td>
                  <td><a href="#" class="btn btn-sm btn-outline-primary">Apply</a></td>
                </tr>
                <tr>
                  <td>May 20, 2026</td>
                  <td>Girls in STEM Career Fair</td>
                  <td>Dar es Salaam</td>
                  <td><span class="badge badge-info">Career Fair</span></td>
                  <td><a href="#" class="btn btn-sm btn-outline-primary">Join</a></td>
                </tr>
                <tr>
                  <td>June 10, 2026</td>
                  <td>Primary School Science Fair</td>
                  <td>Dodoma</td>
                  <td><span class="badge badge-warning">Showcase</span></td>
                  <td><a href="#" class="btn btn-sm btn-outline-primary">Learn More</a></td>
                </tr>
                <tr>
                  <td>July 18, 2026</td>
                  <td>Youth Innovation Summit</td>
                  <td>Dar es Salaam</td>
                  <td><span class="badge badge-danger">Summit</span></td>
                  <td><a href="#" class="btn btn-sm btn-outline-primary">Register</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>


</x-landing-layout>

