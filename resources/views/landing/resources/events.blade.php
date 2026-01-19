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
        @forelse($upcomingEvents as $event)
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
              <p>{{ Str::limit($event->details, 120) }}</p>
              @if($event->application_link)
                <p><a href="{{ $event->application_link }}" target="_blank" class="btn btn-primary btn-sm">
                  {{ $event->status === 'open' ? 'Register Now' : 'Learn More' }} <i class="ion-ios-arrow-forward"></i>
                </a></p>
              @else
                <p><a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Contact Us <i class="ion-ios-arrow-forward"></i></a></p>
              @endif
            </div>
          </div>
        </div>
        @empty
        <div class="col-12">
          <div class="alert alert-info text-center">
            <h4>No Upcoming Events</h4>
            <p>Check back soon for exciting events and opportunities!</p>
          </div>
        </div>
        @endforelse
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
        @forelse($pastEvents as $event)
        <div class="col-md-6 col-lg-3 ftco-animate mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 mr-3">
                  <i class="icon-trophy text-primary" style="font-size: 24px;"></i>
                </div>
                <small class="text-muted">{{ $event->event_date->format('M d, Y') }}</small>
              </div>
              <h5 class="card-title mb-3">{{ $event->name }}</h5>
              <p class="card-text text-muted small">
                {{ Str::limit($event->details, 100) }}
              </p>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12">
          <p class="text-center text-muted">No past events to display yet.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>



  <section class="ftco-section">
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
                @forelse($upcomingEvents as $event)
                <tr>
                  <td>{{ $event->event_date->format('M d, Y') }}</td>
                  <td>{{ $event->name }}</td>
                  <td>{{ $event->location }}</td>
                  <td><span class="badge badge-primary">{{ ucfirst($event->type) }}</span></td>
                  <td>
                    @if($event->application_link)
                      <a href="{{ $event->application_link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        {{ $event->status === 'open' ? 'Register' : 'Learn More' }}
                      </a>
                    @else
                      <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-primary">Contact</a>
                    @endif
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center">No events scheduled at the moment</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

</x-landing-layout>
