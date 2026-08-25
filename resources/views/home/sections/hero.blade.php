<section
    class="hero"
    @if($settings && $settings->hero_image)
        style="background-image: url('{{ asset('storage/' . $settings->hero_image) }}');"
    @endif
>

    {{-- Overlay pour rendre le texte lisible --}}
    <div class="hero-overlay"></div>

    <div class="container position-relative hero-content">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-9">

                <span class="hero-badge">
                    🏗️ Immobilier • Construction • Architecture
                </span>

                <h1 class="hero-title mt-4">
                    Construisons ensemble votre
                    <span>avenir immobilier.</span>
                </h1>

                <p class="hero-text mt-4">
                    OneLove Immo vous accompagne dans l'achat, la vente,
                    la location, la construction, la rénovation et
                    l'architecture de vos projets.
                </p>

                <div class="hero-buttons mt-5">

                    <a href="{{ route('properties.index') }}"
                       class="btn btn-primary btn-lg me-3">
                        Explorer les biens
                    </a>

                    <a href="{{ route('construction.index') }}"
                       class="btn btn-warning btn-lg">
                        Nos constructions
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>