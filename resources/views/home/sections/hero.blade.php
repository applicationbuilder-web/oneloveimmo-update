<section
    class="hero"
    @if($settings && $settings->hero_image)
        style="background-image: url('{{ asset('storage/' . $settings->hero_image) }}') !important;"
    @endif
>

    {{-- Overlay pour rendre le texte parfaitement lisible --}}
    <div class="hero-overlay"></div>

    <div class="container position-relative hero-content py-5">

        <div class="row align-items-center min-vh-75 min-vh-lg-100">

            <div class="col-xl-9 col-lg-10 col-12">

                <div class="hero-badge-wrapper mb-3 mb-md-4">
                    <span class="hero-badge">
                        <i class="fa-solid fa-shapes text-warning me-2"></i>
                        Immobilier • Construction • Architecture
                    </span>
                </div>

                <h1 class="hero-title mt-2">
                    Construisons ensemble votre
                    <span class="text-gradient-gold">avenir immobilier.</span>
                </h1>

                <p class="hero-text mt-3 mt-md-4">
                    OneLove Immo vous accompagne dans l'achat, la vente,
                    la location, la construction, la rénovation et
                    l'architecture de vos projets d'exception.
                </p>

                {{-- Boutons Hero Responsives --}}
                <div class="hero-buttons mt-4 mt-md-5 d-flex flex-column flex-sm-row gap-3 align-items-stretch align-items-sm-center">

                    <a href="{{ route('properties.index') }}"
                       class="btn btn-hero btn-hero-primary w-100 w-sm-auto">
                        <i class="fa-solid fa-compass me-2"></i>
                        <span>Explorer nos biens</span>
                    </a>

                    <a href="{{ route('construction.index') }}"
                       class="btn btn-hero btn-hero-warning w-100 w-sm-auto">
                        <i class="fa-solid fa-trowel-bricks me-2"></i>
                        <span>Nos constructions</span>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>