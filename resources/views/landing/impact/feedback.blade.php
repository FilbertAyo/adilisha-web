<x-landing-layout>

  <div class="hero-wrap2" style="background-image: url('{{ asset('front-end/images/hero_bg.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span class="mr-2"><a href="#">Impact</a></span>
            <span>Beneficiaries Feedback</span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Beneficiaries Feedback</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Voices from Our Community</h2>
          <p>
            Hear directly from students, teachers, parents, and community members about 
            their experiences with Adilisha's programs.
          </p>
        </div>
      </div>

      @if(session('success'))
        <div class="col-12 mb-4">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      @endif

      <div class="row">
        @forelse($feedbacks as $feedback)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="staff h-100">
              <div class="text pt-3 text-center">
                <h3>{{ $feedback->name }}</h3>
                <span class="position mb-2">
                  @if($feedback->position)
                    {{ $feedback->position }}{{ $feedback->from ? ', ' . $feedback->from : '' }}
                  @elseif($feedback->from)
                    {{ $feedback->from }}
                  @endif
                </span>
                <div class="faded">
                  <p class="mb-2">
                    "{{ $feedback->message }}"
                  </p>
                  <p class="text-primary font-weight-bold mb-0">
                    @for($i = 0; $i < $feedback->rating; $i++)
                      ★
                    @endfor
                  </p>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center">
            <p class="text-muted">No feedback available yet. Be the first to share your experience!</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 ftco-animate">
          <div class="bg-light p-5">
            <h3 class="mb-4 text-center">Share Your Experience</h3>
            <p class="text-center mb-4">
              Have you participated in our programs? We'd love to hear from you! 
              Your feedback helps us improve and inspire others.
            </p>
            
            <form action="{{ route('impact.feedback.store') }}" method="POST">
              @csrf
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" 
                         id="name" name="name" value="{{ old('name') }}" required>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" 
                         id="email" name="email" value="{{ old('email') }}" required>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="from" class="form-label">From (Location)</label>
                  <input type="text" class="form-control @error('from') is-invalid @enderror" 
                         id="from" name="from" value="{{ old('from') }}" 
                         placeholder="e.g., Dar es Salaam, Arusha">
                  @error('from')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="position" class="form-label">Position</label>
                  <input type="text" class="form-control @error('position') is-invalid @enderror" 
                         id="position" name="position" value="{{ old('position') }}" 
                         placeholder="e.g., Student, Teacher, Parent">
                  @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              
              <div class="mb-3">
                <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                <select class="form-control @error('rating') is-invalid @enderror" 
                        id="rating" name="rating" required>
                  <option value="">Select rating</option>
                  <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>★★★★★ (5 stars)</option>
                  <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>★★★★ (4 stars)</option>
                  <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>★★★ (3 stars)</option>
                  <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>★★ (2 stars)</option>
                  <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>★ (1 star)</option>
                </select>
                @error('rating')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="message" class="form-label">Your Feedback <span class="text-danger">*</span></label>
                <textarea class="form-control @error('message') is-invalid @enderror" 
                          id="message" name="message" rows="5" 
                          placeholder="Share your experience with Adilisha's programs..." 
                          required>{{ old('message') }}</textarea>
                @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-3">Submit Your Feedback</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  

</x-landing-layout>

