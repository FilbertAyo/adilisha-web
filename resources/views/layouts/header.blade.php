<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('front-end/images/logo/logo-light.png') }}" alt="Logo" class="logo logo-light">
      <img src="{{ asset('front-end/images/logo/logo-dark.png') }}" alt="Logo" class="logo logo-dark">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu text-primary"></span>
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="about.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About Us
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="{{ route('about-us') }}">Who We Are</a>
            <a class="dropdown-item" href="{{ route('our-team') }}">Our Team</a>
            <a class="dropdown-item" href="{{ route('agenda-2049') }}">Adilisha Agenda 2049</a>
            <a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="programs.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Programs
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown05">
            <a class="dropdown-item" href="{{ route('programs.chomoza') }}">CHOMOZA STEM Project</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('workshops') }}">STEM Workshops</a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="impact.html" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Impact</a>
          <div class="dropdown-menu" aria-labelledby="dropdown06">
            <a class="dropdown-item" href="{{ route('impact.stories') }}">Success Stories</a>
            <a class="dropdown-item" href="{{ route('impact.feedback') }}">Beneficiaries Feedback</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)"
            id="dropdown07" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Get Involved
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown07">
            <a class="dropdown-item" href="{{ route('donations') }}">Donation</a>
            <a class="dropdown-item" href="{{ route('partnership') }}">Partner With Us</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="about.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Resources
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="{{ route('resources.carrier') }}">Carrier Opportunities</a>
            <a class="dropdown-item" href="{{ route('resources.recruit') }}">Adilisha Recruitment Portal</a>
            <a class="dropdown-item" href="{{ route('resources.gallery') }}">Gallery</a>
            <a class="dropdown-item" href="{{ route('resources.events') }}">Events & Global Challenges</a>
            <a class="dropdown-item" href="{{ route('resources.reports') }}">Publications</a>
          </div>
        </li>

        <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>

        <li class="nav-item cta-btn ml-lg-2"><a href="{{ route('login') }}" class="nav-link btn btn-primary px-4">Login</a></li>

      </ul>
    </div>
  </div>
</nav>