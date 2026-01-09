<x-landing-layout>
    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span class="mr-2"><a href="{{ route('workshops') }}">Workshops</a></span> <span>Workshop Details</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Workshop Details</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            
            <!-- Workshop Title and Overview -->
            <h2 class="mb-3">Advanced STEM Workshop for Girls</h2>
            <div class="meta mb-4">
              <div class="d-flex align-items-center mb-3">
                <span class="mr-3"><i class="icon-calendar"></i> March 15, 2024</span>
                <span class="mr-3"><i class="icon-clock-o"></i> 9:00 AM - 4:00 PM</span>
                <span><i class="icon-map-o"></i> Dar es Salaam, Tanzania</span>
              </div>
            </div>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>
            
            <p>
              <img src="front-end/images/workshop-main.jpg" alt="Workshop" class="img-fluid">
            </p>
            
            <h3 class="mb-3 mt-5">Workshop Overview</h3>
            <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
            
            <h3 class="mb-3 mt-5">What We Learned</h3>
            <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
            
            <!-- Gallery of What We Learned -->
            <div class="row mt-4 mb-5">
              <div class="col-md-6 mb-3">
                <img src="front-end/images/workshop-gallery-1.jpg" alt="Learning" class="img-fluid rounded">
              </div>
              <div class="col-md-6 mb-3">
                <img src="front-end/images/workshop-gallery-2.jpg" alt="Learning" class="img-fluid rounded">
              </div>
              <div class="col-md-6 mb-3">
                <img src="front-end/images/workshop-gallery-3.jpg" alt="Learning" class="img-fluid rounded">
              </div>
              <div class="col-md-6 mb-3">
                <img src="front-end/images/workshop-gallery-4.jpg" alt="Learning" class="img-fluid rounded">
              </div>
            </div>
            
            <!-- Participation & Attendance -->
            <div class="bg-light p-4 rounded mb-5">
              <h3 class="mb-4 text-primary">Participation & Attendance</h3>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <h5><strong>Total Participants:</strong> 45 students</h5>
                </div>
                <div class="col-md-6 mb-3">
                  <h5><strong>Girls Participation:</strong> 28 (62%)</h5>
                </div>
                <div class="col-md-6 mb-3">
                  <h5><strong>Attendance Rate:</strong> 98%</h5>
                </div>
                <div class="col-md-6 mb-3">
                  <h5><strong>Schools Represented:</strong> 8 schools</h5>
                </div>
              </div>
            </div>
            
            <!-- Testimonials -->
            <div class="mt-5 mb-5">
              <h3 class="mb-4">Testimonials</h3>
              
              <div class="testimonial p-4 bg-light rounded mb-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="bio mr-4">
                    <img src="front-end/images/beneficiary-1.jpg" alt="Student" class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                  </div>
                  <div>
                    <h5 class="mb-1">Sarah Juma</h5>
                    <p class="text-muted mb-0">Student, Mwanza Secondary School</p>
                  </div>
                </div>
                <p class="mb-0">"This workshop changed my perspective on STEM. I never thought I could be good at coding, but the hands-on activities made it so easy to understand. I'm now considering pursuing Computer Science in university!"</p>
              </div>
              
              <div class="testimonial p-4 bg-light rounded mb-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="bio mr-4">
                    <img src="front-end/images/beneficiary-2.jpg" alt="Student" class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                  </div>
                  <div>
                    <h5 class="mb-1">Amina Hassan</h5>
                    <p class="text-muted mb-0">Student, Dar es Salaam High School</p>
                  </div>
                </div>
                <p class="mb-0">"The robotics session was incredible! Building and programming my first robot was such an empowering experience. The facilitators were patient and encouraging. I'm excited to join more workshops!"</p>
              </div>
              
              <div class="testimonial p-4 bg-light rounded">
                <div class="d-flex align-items-center mb-3">
                  <div class="bio mr-4">
                    <img src="front-end/images/beneficiary-3.jpg" alt="Teacher" class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                  </div>
                  <div>
                    <h5 class="mb-1">Mr. John Mwanga</h5>
                    <p class="text-muted mb-0">Teacher, Kilimanjaro Secondary</p>
                  </div>
                </div>
                <p class="mb-0">"As an educator, I'm impressed by how this workshop engaged the students. The practical approach to STEM education is exactly what our curriculum needs. I've learned new teaching methods that I'll implement in my classroom."</p>
              </div>
            </div>
            
            <!-- Beneficiaries Gallery -->
            <div class="mt-5">
              <h3 class="mb-4">Our Beneficiaries</h3>
              <p>Meet some of the amazing students who participated in this workshop and are now pursuing their dreams in STEM fields.</p>
              
              <div class="row mt-4">
                <div class="col-md-4 mb-4">
                  <div class="beneficiary-card text-center">
                    <img src="front-end/images/beneficiary-gallery-1.jpg" alt="Beneficiary" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                    <h5>Fatuma Ali</h5>
                    <p class="text-muted">Future Engineer</p>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="beneficiary-card text-center">
                    <img src="front-end/images/beneficiary-gallery-2.jpg" alt="Beneficiary" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                    <h5>Grace Mwanga</h5>
                    <p class="text-muted">Future Programmer</p>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="beneficiary-card text-center">
                    <img src="front-end/images/beneficiary-gallery-3.jpg" alt="Beneficiary" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                    <h5>Mary Joseph</h5>
                    <p class="text-muted">Future Scientist</p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">STEM</a>
                <a href="#" class="tag-cloud-link">Workshop</a>
                <a href="#" class="tag-cloud-link">Education</a>
                <a href="#" class="tag-cloud-link">Girls in STEM</a>
                <a href="#" class="tag-cloud-link">Technology</a>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          
          <!-- Sidebar -->
          <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Search workshops...">
                </div>
              </form>
            </div>
            
            <div class="sidebar-box ftco-animate">
              <h3>Workshop Information</h3>
              <ul class="list-unstyled">
                <li class="mb-3"><strong>Date:</strong> March 15, 2024</li>
                <li class="mb-3"><strong>Time:</strong> 9:00 AM - 4:00 PM</li>
                <li class="mb-3"><strong>Location:</strong> Dar es Salaam, Tanzania</li>
                <li class="mb-3"><strong>Duration:</strong> Full Day</li>
                <li class="mb-3"><strong>Participants:</strong> 45 students</li>
                <li><strong>Status:</strong> Completed</li>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Workshops</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(front-end/images/workshop-1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Introduction to Robotics Workshop</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Feb 20, 2024</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(front-end/images/workshop-2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Coding for Beginners</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Jan 10, 2024</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(front-end/images/workshop-3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Science Experiments Workshop</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dec 5, 2023</a></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Workshop Categories</h3>
              <ul class="categories">
                <li><a href="#">Robotics <span>(5)</span></a></li>
                <li><a href="#">Coding <span>(8)</span></a></li>
                <li><a href="#">Science <span>(6)</span></a></li>
                <li><a href="#">Mathematics <span>(4)</span></a></li>
                <li><a href="#">Engineering <span>(3)</span></a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

 </x-landing-layout>

