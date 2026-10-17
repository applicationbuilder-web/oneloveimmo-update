<section class="featured-properties-section py-5 bg-light">
    <div class="container">

        {{-- En-tête de section --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">
            <div>
                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold mb-2">
                    <i class="fa-solid fa-star text-warning me-1"></i> Sélection exclusive
                </span>
                <h2 class="section-title mt-1 mb-2">
                    Nos Biens en Vedette
                </h2>
                <p class="section-subtitle mb-0">
                    Découvrez une sélection rigoureuse de nos opportunités immobilières du moment.
                </p>
            </div>

            <div>
                <a href="{{ route('properties.index') }}"
                   class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                    <span>Explorer tous nos biens</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        {{-- Grille des biens --}}
        <div class="row g-4">
            @forelse($properties as $property)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-property-card :property="$property" />
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 text-center py-5 px-4 bg-white">
                        <div class="mb-3">
                            <span class="d-inline-flex align-items-center justify-content-center bg-light text-primary rounded-circle" style="width: 70px; height: 70px;">
                                <i class="fa-solid fa-house-chimney fa-2x"></i>
                            </span>
                        </div>
                        <h4 class="fw-bold text-dark mb-2">Nouveaux biens en cours d'ajout</h4>
                        <p class="text-muted mb-4 mx-auto" style="max-width: 500px;">
                            Notre équipe met régulièrement à jour notre catalogue. Consultez l'ensemble de nos offres ou contactez-nous directement.
                        </p>
                        <div>
                            <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold">
                                <i class="fa-solid fa-envelope me-2"></i> Nous contacter
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>
