<x-landing-layout>

  
    
    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
  <div class="container">
    <div class="row d-flex align-items-center">

      <!-- Image -->
      <div class="col-md-6 ftco-animate">
        <div class="img img-about align-self-stretch rounded"
             style="background-image: url(front-end/images/about_img.jpg); width: 100%; height: 100%; min-height: 420px;">
        </div>
      </div>

      <!-- Intro Content -->
      <div class="col-md-6 pl-md-5 ftco-animate">
        <h2 class="mb-4">Who We Are</h2>

        <p>
          Adilisha Youth and Child Development Organization is a Tanzania-based NGO
          dedicated to empowering children and youth—especially girls—through
          inclusive STEM education and leadership development.
        </p>

        <p>
          We work closely with schools, teachers, and communities to deliver hands-on,
          practical learning experiences that spark curiosity, confidence, and innovation.
        </p>

        <p class="text-primary font-weight-bold mb-0">
          From early exposure to advanced STEM skills, we focus on long-term impact.
        </p>
      </div>

    </div>
  </div>
</section>


<section class="ftco-section mb-5">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-10 ftco-animate">

        <div class="bg-light p-5" style="border-radius: 10px; border-left: 5px solid #0d78b8;">

          <h3 class="mb-4 text-primary">
            What We Do and Why It Matters
          </h3>

          <p style="line-height: 1.8;" class="text-justify">
            Many children in underserved communities lack access to quality STEM education,
            limiting their ability to participate in the digital economy. Girls are
            disproportionately affected due to cultural, economic, and systemic barriers.
          </p>

          <p style="line-height: 1.8;" class="text-justify">
            Adilisha addresses these challenges by introducing STEM learning early, using
            practical tools, experiments, and project-based approaches that make science
            and technology relatable and engaging.
          </p>

          <p style="line-height: 1.8;" class="text-justify">
            Through flagship initiatives such as <strong>VUTAMDOGO</strong> and
            <strong>CHOMOZA</strong>, we create safe and supportive learning environments
            where students can explore, experiment, and build confidence in their abilities.
          </p>

          <p style="line-height: 1.8;" class="text-justify">
            Our approach goes beyond students. We support teachers with training,
            curriculum support, and resources, and we actively involve parents and
            communities to ensure sustainability and ownership.
          </p>

          <p class="mb-0" style="line-height: 1.8;" class="text-justify">
            By combining education, mentorship, and community collaboration, Adilisha
            is building a generation of problem-solvers, innovators, and leaders prepared
            for the future.
          </p>

        </div>

      </div>
    </div>

  </div>
</section>



 @include('partials.mission')


</x-landing-layout>
