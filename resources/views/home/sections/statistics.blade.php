<section class="statistics-section py-5 position-relative overflow-hidden">

    <div class="statistics-glow-1"></div>
    <div class="statistics-glow-2"></div>

    <div class="container position-relative z-1 py-3">

        <div class="row text-center g-4">

            <div class="col-6 col-lg-3">

                <div class="stat-card h-100 p-4 rounded-4">

                    <div class="stat-icon-wrapper mb-3">
                        <i class="fa-solid fa-house-chimney stat-icon"></i>
                    </div>

                    <h2 class="stat-number fw-bold mb-1">{{ $settings?->getEffectivePropertiesCount() ?? \App\Models\Property::count() }}</h2>

                    <p class="stat-label mb-0">Biens disponibles</p>

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="stat-card h-100 p-4 rounded-4">

                    <div class="stat-icon-wrapper mb-3">
                        <i class="fa-solid fa-building stat-icon"></i>
                    </div>

                    <h2 class="stat-number fw-bold mb-1">{{ $settings?->getEffectiveProjectsCount() ?? \App\Models\Construction::count() }}</h2>

                    <p class="stat-label mb-0">Projets réalisés</p>

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="stat-card h-100 p-4 rounded-4">

                    <div class="stat-icon-wrapper mb-3">
                        <i class="fa-solid fa-users stat-icon"></i>
                    </div>

                    <h2 class="stat-number fw-bold mb-1">{{ $settings?->getEffectiveClientsCount() ?? (\App\Models\Quote::count() + \App\Models\Contact::count()) }}</h2>

                    <p class="stat-label mb-0">Clients & Demandes</p>

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="stat-card h-100 p-4 rounded-4">

                    <div class="stat-icon-wrapper mb-3">
                        <i class="fa-solid fa-award stat-icon"></i>
                    </div>

                    <h2 class="stat-number fw-bold mb-1">{{ $settings?->getEffectiveExperienceCount() ?? '5' }}</h2>

                    <p class="stat-label mb-0">Années d'expertise</p>

                </div>

            </div>

        </div>

    </div>

</section>