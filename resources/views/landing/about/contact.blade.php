<x-landing-layout>

    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Contact</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Contact Information</h2>
                </div>

                <div class="w-100"></div>

                <div class="col-md-3">
                    <p>
                        <span>Address:</span><br>
                        Bondeni Street, Mwanza, Tanzania
                    </p>
                </div>

                <div class="col-md-3">
                    <p>
                        <span>Phone:</span><br>
                        <a href="tel:+255282561724">+255 28 256 1724</a>
                    </p>
                </div>

                <div class="col-md-3">
                    <p>
                        <span>Email:</span><br>
                        <a href="mailto:info@adilisha.or.tz">info@adilisha.or.tz</a>
                    </p>
                </div>

                <div class="col-md-3">
                    <p>
                        <span>Open Hours:</span><br>
                        Mon – Sat: 08:00 AM – 05:00 PM
                    </p>
                </div>
            </div>

            <div class="row block-9">
                <!-- Contact Form -->
                <div class="col-md-6 pr-md-5">
                    <h4 class="mb-4">Connect With Adilisha</h4>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="7" placeholder="Message" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>

                <!-- Map Column -->
                <div class="col-md-6">
                    <div class="map-wrap mb-5">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.028861059142!2d32.89901417575713!3d-2.497376797481241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19ce7b9bb66764f1%3A0x5be3a3a8049dc0fb!2sAdilisha%20CHOMOZA%20S.T.E.M%20Labs!5e0!3m2!1sen!2stz!4v1767868313149!5m2!1sen!2stz"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
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