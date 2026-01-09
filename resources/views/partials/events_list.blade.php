<section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Latest Events</h2>
        <p>Join us at our upcoming events and be part of the STEM revolution</p>
          </div>
        </div>
        <div class="row">
      @forelse($events ?? [] as $event)
        	<div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
          <a href="#" class="block-20" style="background-image: url('{{ $event->image ? asset($event->image) : asset('front-end/images/hero_bg.jpg') }}');">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
              <div><a href="#">{{ $event->event_date->format('M d, Y') }}</a></div>
              <div><a href="#">{{ $event->organizer ?? 'Adilisha' }}</a></div>
              <div>
                @if($event->status === 'open')
                  <span class="badge badge-success">Open</span>
                @elseif($event->status === 'closed')
                  <span class="badge badge-danger">Closed</span>
                @else
                  <span class="badge badge-warning">Upcoming</span>
                @endif
              </div>
            </div>
            <h3 class="heading mb-4"><a href="#">{{ $event->name }}</a></h3>
            <p class="time-loc">
              <span class="mr-2"><i class="icon-clock-o"></i> {{ $event->event_date->format('h:i A') }}</span>
              <span><i class="icon-map-o"></i> {{ $event->location }}</span>
            </p>
            <p>{{ Str::limit($event->details, 100) }}</p>
            @if($event->application_link && $event->status === 'open')
              <p><a href="{{ $event->application_link }}" target="_blank">Register Now <i class="ion-ios-arrow-forward"></i></a></p>
            @else
              <p><a href="{{ route('resources.events') }}">Learn More <i class="ion-ios-arrow-forward"></i></a></p>
            @endif
          </div>
              </div>
            </div>
      @empty
      <div class="col-12">
        <div class="alert alert-info text-center">
          <p class="mb-0">No upcoming events at the moment. Check back soon!</p>
        </div>
      </div>
      @endforelse
    </div>
    
    @if(isset($events) && $events->count() > 0)
    <div class="row mt-4">
      <div class="col-12 text-center">
        <a href="{{ route('resources.events') }}" class="btn btn-primary">View All Events</a>
      </div>
    </div>
    @endif
      </div>
    </section>
