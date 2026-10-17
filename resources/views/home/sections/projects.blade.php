<section class="projects-section py-5 bg-light">

    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">
            <div>
                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold mb-2">
                    <i class="fa-solid fa-helmet-safety text-warning me-1"></i> Chantier & Projets
                </span>
                <h2 class="section-title mt-1 mb-2">
                    Nos Réalisations & Chantiers
                </h2>
                <p class="section-subtitle mb-0">
                    Découvrez quelques-uns de nos projets récents de construction et d'architecture.
                </p>
            </div>

            <div>
                <a href="{{ route('construction.index') }}"
                   class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                    <span>Toutes nos constructions</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">

            @forelse($constructions as $construction)

                <div class="col-md-6 col-lg-4">

                    <div class="project-card shadow-sm rounded-4 overflow-hidden position-relative h-100">

                        @if($construction->image)

                            <img
                                src="{{ asset('storage/' . $construction->image) }}"
                                class="project-img w-100"
                                alt="{{ $construction->title }}"
                                loading="lazy">

                        @else

                            <div
                                class="d-flex flex-column align-items-center justify-content-center bg-secondary-subtle text-muted w-100"
                                style="height: 320px;">

                                <i class="fa-solid fa-trowel-bricks fa-3x mb-2 text-primary opacity-50"></i>
                                <span class="small fw-semibold">Projet en développement</span>

                            </div>

                        @endif

                        <div class="project-overlay d-flex flex-column justify-content-end p-4">

                            @if($construction->status)
                                <div class="mb-2">
                                    <span class="badge bg-warning text-dark px-3 py-1 rounded-pill fw-semibold small shadow-sm">
                                        {{ ucfirst(str_replace('_', ' ', $construction->status)) }}
                                    </span>
                                </div>
                            @endif

                            <h4 class="fw-bold text-white mb-1">
                                {{ $construction->title }}
                            </h4>

                            <p class="text-white-50 small mb-0 d-flex align-items-center">
                                <i class="fa-solid fa-location-dot text-warning me-2"></i>
                                <span>{{ $construction->location ?? 'Congo' }}</span>
                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="card border-0 shadow-sm rounded-4 text-center py-5 px-4 bg-white">

                        <div class="mb-3">
                            <span class="d-inline-flex align-items-center justify-content-center bg-light text-warning rounded-circle" style="width: 70px; height: 70px;">
                                <i class="fa-solid fa-building fa-2x"></i>
                            </span>
                        </div>

                        <h4 class="fw-bold text-dark mb-2">
                            Aucune réalisation disponible pour l'instant
                        </h4>

                        <p class="text-muted mb-4 mx-auto" style="max-width: 500px;">
                            Nos prochains chantiers et réalisations seront bientôt présentés ici. N'hésitez pas à nous contacter pour nous faire part de vos projets.
                        </p>

                        <div>
                            <a href="{{ route('quotes.create') }}" class="btn btn-warning rounded-pill px-4 py-2 fw-bold text-dark shadow-sm">
                                <i class="fa-solid fa-file-signature me-2"></i> Demander un devis de construction
                            </a>
                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>