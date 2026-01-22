<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">Stories of Change</h2>
       
      </div>
    </div>

    <div class="row">
      @forelse($stories as $story)
        <div class="col-md-6 col-lg-4 d-flex mb-4 ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="{{ route('impact.stories.show', $story->id) }}" class="block-20" 
               style="background-image: url('{{ $story->profile_picture ? asset('storage/' . $story->profile_picture) : asset('front-end/images/success-1.jpg') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div>
                  <span class="icon-location-arrow mr-2"></span>{{ $story->location }}
                </div>
                <div>
                  <span class="icon-tag mr-2"></span>
                  <span class="badge badge-primary">{{ ucfirst($story->category) }}</span>
                </div>
              </div>
              <h3 class="heading mb-3">
                <a href="{{ route('impact.stories.show', $story->id) }}">{{ $story->title }}</a>
              </h3>
              <p class="mb-3"><strong>{{ $story->name }}</strong></p>
              <p>{{ $story->excerpt }}</p>
              <a href="{{ route('impact.stories.show', $story->id) }}" class="btn btn-primary btn-sm">
                Read Full Story
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>No success stories available at the moment.</p>
        </div>
      @endforelse
    </div>

    <div class="row justify-content-center mt-4">
      <a href="{{ route('impact.stories') }}" class="btn btn-primary btn-lg px-5 py-3">
        View All Stories
      </a>
    </div>
  </div>
</section>
       