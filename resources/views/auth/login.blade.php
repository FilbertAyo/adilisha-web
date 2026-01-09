  <x-guest-layout>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5">
            <div class="login-wrap p-4 p-md-5" style="background: #fff; border-radius: 5px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
              <div class="icon d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; background: #78d5ef; border-radius: 50%; margin: 0 auto 20px;">
                <span class="icon-user" style="font-size: 40px; color: #fff;"></span>
              </div>
              <h3 class="text-center mb-4" style="color: #000; font-weight: 600;">Login</h3>
              
              <!-- Session Status -->
              @if (session('status'))
                <div class="alert alert-success mb-4" role="alert">
                  {{ session('status') }}
                </div>
              @endif

              <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div class="form-group mb-4">
                  <label for="email" style="color: #000; font-weight: 500; margin-bottom: 8px; display: block;">Email Address</label>
                  <input 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="Enter your email"
                    style="height: 50px; border: 1px solid #e6e6e6; border-radius: 5px; padding: 10px 20px;">
                  @error('email')
                    <div class="invalid-feedback" style="display: block;">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Password -->
                <div class="form-group mb-4">
                  <label for="password" style="color: #000; font-weight: 500; margin-bottom: 8px; display: block;">Password</label>
                  <input 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    id="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="Enter your password"
                    style="height: 50px; border: 1px solid #e6e6e6; border-radius: 5px; padding: 10px 20px;">
                  @error('password')
                    <div class="invalid-feedback" style="display: block;">
                      {{ $message }}
                    </div>
                  @enderror
                </div>


                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary" style="height: 50px; border-radius: 5px; font-weight: 600; font-size: 16px;">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

</x-guest-layout>