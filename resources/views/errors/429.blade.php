<x-guest-layout>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center ftco-animate">
                    <div class="error-page-wrap">
                        <h1 class="display-1 mb-4" style="font-size: 8rem; font-weight: 700; color: #F96D00;">429</h1>
                        <h2 class="mb-4">Too Many Requests</h2>
                        <p class="mb-4">You have made too many requests in a short period of time. Please wait a moment and try again.</p>
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

