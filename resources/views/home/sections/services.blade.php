<section class="services-section py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa-solid fa-briefcase text-warning me-1"></i> Notre savoir-faire
            </span>

            <h2 class="section-title mt-1 mb-2">
                Nos Services d'Excellence
            </h2>

            <p class="section-subtitle mx-auto" style="max-width: 650px;">
                Nous vous accompagnons à chaque étape de vos projets immobiliers, de construction et d'architecture.
            </p>

        </div>

        <div class="row g-4">

            <!-- Immobilier -->
            <div class="col-md-6 col-lg-3">

                <div class="service-card h-100 p-4 rounded-4 border-0 shadow-sm d-flex flex-column text-center">

                    <div class="service-icon mb-4">
                        <i class="fa-solid fa-house"></i>
                    </div>

                    <h4 class="fw-bold mb-3">Immobilier</h4>

                    <p class="text-muted mb-4 flex-grow-1">
                        Achat, vente, location sécurisée de maisons, appartements de standing, terrains et immeubles.
                    </p>

                    <a href="{{ route('properties.index') }}" class="service-link text-primary fw-semibold text-decoration-none mt-auto">
                        <span>Explorer les biens</span>
                        <i class="fa-solid fa-arrow-right-long ms-1"></i>
                    </a>

                </div>

            </div>

            <!-- Construction -->
            <div class="col-md-6 col-lg-3">

                <div class="service-card h-100 p-4 rounded-4 border-0 shadow-sm d-flex flex-column text-center">

                    <div class="service-icon mb-4">
                        <i class="fa-solid fa-building"></i>
                    </div>

                    <h4 class="fw-bold mb-3">Construction</h4>

                    <p class="text-muted mb-4 flex-grow-1">
                        Gros œuvre, villas contemporaines, bâtiments commerciaux et travaux de génie civil de haute qualité.
                    </p>

                    <a href="{{ route('construction.index') }}" class="service-link text-primary fw-semibold text-decoration-none mt-auto">
                        <span>Nos constructions</span>
                        <i class="fa-solid fa-arrow-right-long ms-1"></i>
                    </a>

                </div>

            </div>

            <!-- Architecture -->
            <div class="col-md-6 col-lg-3">

                <div class="service-card h-100 p-4 rounded-4 border-0 shadow-sm d-flex flex-column text-center">

                    <div class="service-icon mb-4">
                        <i class="fa-solid fa-compass-drafting"></i>
                    </div>

                    <h4 class="fw-bold mb-3">Architecture</h4>

                    <p class="text-muted mb-4 flex-grow-1">
                        Conception 2D & 3D, modélisation architecturale, design d'espaces et suivi rigoureux des chantiers.
                    </p>

                    <a href="{{ route('quotes.create') }}" class="service-link text-primary fw-semibold text-decoration-none mt-auto">
                        <span>Demander un plan</span>
                        <i class="fa-solid fa-arrow-right-long ms-1"></i>
                    </a>

                </div>

            </div>

            <!-- Rénovation -->
            <div class="col-md-6 col-lg-3">

                <div class="service-card h-100 p-4 rounded-4 border-0 shadow-sm d-flex flex-column text-center">

                    <div class="service-icon mb-4">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </div>

                    <h4 class="fw-bold mb-3">Rénovation</h4>

                    <p class="text-muted mb-4 flex-grow-1">
                        Modernisation complète, aménagement intérieur, réhabilitation et valorisation de votre patrimoine.
                    </p>

                    <a href="{{ route('quotes.create') }}" class="service-link text-primary fw-semibold text-decoration-none mt-auto">
                        <span>Estimer les travaux</span>
                        <i class="fa-solid fa-arrow-right-long ms-1"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>