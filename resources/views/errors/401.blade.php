<x-guest-layout>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center ftco-animate">
                    <div class="error-page-wrap">
                        <h1 class="display-1 mb-4" style="font-size: 8rem; font-weight: 700; color: #126cbf;">401</h1>
                        <h2 class="mb-4">Unauthorized Access</h2>
                        <p class="mb-4">You need to be authenticated to access this page. Please log in to continue.</p>
                        <p>
                            <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">Go to Login</a>
                            <a href="{{ url('/') }}" class="btn btn-secondary px-4 py-2">Go to Home</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>