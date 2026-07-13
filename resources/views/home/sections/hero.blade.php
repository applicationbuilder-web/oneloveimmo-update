<section class="hero">

    <div class="container">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6">

                <span class="hero-badge">

                    🏗️ Immobilier • Construction • Architecture

                </span>

                <h1 class="hero-title mt-4">

                    Construisons ensemble votre avenir immobilier.

                </h1>

                <p class="hero-text mt-4">

                    OneLove Immo vous accompagne dans l'achat, la vente,
                    la location, la construction, la rénovation et
                    l'architecture de vos projets.

                </p>

                <div class="hero-buttons mt-5">

                    <a href="{{ route('properties.index') }}" class="btn btn-primary btn-lg me-3">

                        Explorer les biens

                    </a>

                    <a href="{{ route('construction.index') }}" class="btn btn-warning btn-lg">

                        Nos constructions

                    </a>

                </div>

            </div>

            <div class="col-lg-6 text-center">

                <img
                    src="{{ asset('assets/images/hero/hero.jpg') }}"
                    class="img-fluid hero-image"
                    alt="OneLove Immo">

            </div>

        </div>

    </div>

</section>