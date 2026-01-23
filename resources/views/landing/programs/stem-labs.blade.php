<x-landing-layout>

  <!-- Hero Section -->
  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="#">Programs</a></span>
            <span>STEM Clubs</span>
          </p>
          <h1 class="mb-4 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-size: 4.5rem; font-weight: 700; letter-spacing: -0.02em;">STEM Clubs</h1>

        </div>
      </div>
    </div>
  </div>

  <!-- Overview Section -->
  <section class="ftco-section bg-primary py-5" style="padding-top: 100px !important; padding-bottom: 100px !important;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="img img-about align-self-stretch rounded shadow-lg"
               style="background-image: url({{ asset('front-end/images/stem-club.jpg') }}); width: 100%; height: 100%; min-height: 500px; background-size: cover; background-position: center;">
          </div>
        </div>
        <div class="col-lg-6 pl-lg-5">
          <h2 class="mb-4 text-white" style="font-size: 3.5rem; font-weight: 700; line-height: 1.1; letter-spacing: -0.02em;">What We Do</h2>
          <p class="text-white mb-4" style="font-size: 1.4rem; font-weight: 300; line-height: 1.6;">
            Empowering children, especially girls from rural areas to thrive in STEM education through our <strong>VUTAMDOGO & CHOMOZA STEM Model</strong> under Agenda 2049.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Full Width Image Section -->
  <section class="ftco-section py-0">
    <div class="container-fluid px-0">
      <div class="row no-gutters">
        <div class="col-12">
          <div style="background-image: url({{ asset('front-end/images/stem-clubs-img.jpg') }}); background-size: cover; background-position: center; min-height: 400px; width: 100%;"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Heart of Adilisha Section -->
  <section class="ftco-section bg-primary py-5" style="padding-top: 100px !important; padding-bottom: 100px !important;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
          <div class="img img-about align-self-stretch"
               style="background-image: url({{ asset('front-end/images/stem-clubs3.png') }}); width: 100%; height: 100%; min-height: 500px; background-size: cover; background-position: center;">
          </div>
        </div>
        <div class="col-lg-6 pr-lg-5 order-lg-1">
          <h2 class="mb-4 text-white" style="font-size: 3.5rem; font-weight: 700; line-height: 1.1; letter-spacing: -0.02em;">At the Heart</h2>
          <p class="text-white mb-4" style="font-size: 1.4rem; font-weight: 300; line-height: 1.6;">
            At the heart of Adilisha's work are the <strong>VutaMdogo</strong> and <strong>Chomoza STEM Models</strong>, designed to support children especially girls from rural areas—to excel in STEM education.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- VutaMdogo Section -->
  <section class="ftco-section bg-light py-5" style="padding-top: 100px !important; padding-bottom: 100px !important;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="img img-about align-self-stretch"
               style="background-image: url({{ asset('front-end/images/stem-clubs2.png') }}); width: 100%; height: 100%; min-height: 500px; background-size: cover; background-position: center;">
          </div>
        </div>
        <div class="col-lg-6 pl-lg-5">
          <h2 class="mb-4" style="font-size: 3.5rem; font-weight: 700; line-height: 1.1; letter-spacing: -0.02em; color: #333;">VutaMdogo</h2>
          <p class="mb-4" style="font-size: 1.4rem; font-weight: 300; line-height: 1.6; color: #666;">
          VutaMdogo focuses on foundational STEM learning for primary school children by integrating the fundamental <strong>3R skills</strong> Reading, Writing, and Arithmetic into fun, interactive STEM club activities. It helps build confidence and curiosity in young learners from an early age. 

          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Chomoza/STEM Clubs Section -->
  <section class="ftco-section bg-primary py-5" style="padding-top: 100px !important; padding-bottom: 100px !important;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
          <div class="img img-about align-self-stretch"
               style="background-image: url({{ asset('front-end/images/stem-clubs1.png') }}); width: 100%; height: 100%; min-height: 500px; background-size: cover; background-position: center;">
          </div>
        </div>
        <div class="col-lg-6 pr-lg-5 order-lg-1">
          <p class="text-white mb-4" style="font-size: 1.4rem; font-weight: 300; line-height: 1.6;">
          Chomoza targets secondary school girls through project based learning, mentorship, and real-world STEM exposure. Girls participate in hands-on STEM projects, receive guidance from professionals, and gain practical experience through job shadowing and internships building confidence and skills for future STEM careers 
        </p>
        </div>
      </div>
    </div>
  </section>



</x-landing-layout>
