<x-guest-layout>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center ftco-animate">
                    <div class="error-page-wrap">
                        <h1 class="display-1 mb-4" style="font-size: 8rem; font-weight: 700; color: #F96D00;">500</h1>
                        <h2 class="mb-4">Internal Server Error</h2>
                        <p class="mb-4">We're sorry, but something went wrong on our end. Our team has been notified and is working to fix the issue. Please try again later.</p>
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

