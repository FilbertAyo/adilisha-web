<x-guest-layout>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center ftco-animate">
                    <div class="error-page-wrap">
                        <h1 class="display-1 mb-4" style="font-size: 8rem; font-weight: 700; color: #126cbf;">403</h1>
                        <h2 class="mb-4">Forbidden</h2>
                        <p class="mb-4">You don't have permission to access this resource. Please contact the administrator if you believe this is an error.</p>
                        <p>
                            <a href="{{ url('/') }}" class="btn btn-primary px-4 py-2">Go to Home</a>
                            <a href="javascript:history.back()" class="btn btn-secondary px-4 py-2">Go Back</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>

