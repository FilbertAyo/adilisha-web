<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">

    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('front-end/images/logo/logo-light.png') }}" alt="Logo" class="logo logo-light">
      <img src="{{ asset('front-end/images/logo/logo-dark.png') }}" alt="Logo" class="logo logo-dark">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#ftco-nav" aria-controls="ftco-nav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu text-primary"></span>
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)"
             id="dropdown-who" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            Who We Are
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown-who">
            <a class="dropdown-item" href="{{ route('about-us') }}">About Adilisha</a>
            <a class="dropdown-item" href="{{ route('board-of-directors') }}">Board of Directors</a>
            <a class="dropdown-item" href="{{ route('our-team') }}">Our Team</a>
            <a class="dropdown-item" href="{{ route('agenda-2049') }}">Adilisha Agenda 2049</a>
            <a class="dropdown-item" href="{{ route('impact.stories') }}">Our Impact</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)"
             id="dropdown-what" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            What We Do
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown-what">
            <a class="dropdown-item" href="{{ route('programs.stem-labs') }}">STEM Clubs</a>
           
         </div>
        </li>

       

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)"
             id="dropdown-resources" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
           Join us
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown-resources">
            <a class="dropdown-item" href="{{ route('blog') }}"><strong>Blog</strong></a>
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item" href="{{ route('resources.carrier') }}">Career Opportunities</a> -->
            <a class="dropdown-item" href="{{ route('resources.recruit') }}">Recruitment Portal</a>
            <a class="dropdown-item" href="{{ route('events') }}">STEM Workshops & Events</a>
            <a class="dropdown-item" href="{{ route('resources.gallery') }}">Gallery</a>
            <a class="dropdown-item" href="{{ route('resources.reports') }}">Publications</a>
            <a class="dropdown-item" href="{{ route('partnership') }}">Partner With Us</a>
            <a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a>
          </div>
        </li>


      </ul>
    </div>
  </div>
</nav>