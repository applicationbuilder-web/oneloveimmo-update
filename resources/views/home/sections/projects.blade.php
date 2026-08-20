<section class="projects-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Nos Réalisations
            </h2>

            <p class="section-subtitle">
                Découvrez quelques-uns de nos projets immobiliers et de construction.
            </p>

        </div>

        <div class="row g-4">

            @forelse($constructions as $construction)

                <div class="col-md-4">

                    <div class="project-card">

                        @if($construction->image)

                            <img
                                src="{{ asset('storage/' . $construction->image) }}"
                                class="img-fluid"
                                alt="{{ $construction->title }}">

                        @else

                            <div
                                class="d-flex align-items-center justify-content-center bg-light"
                                style="height: 250px;">

                                <i class="fa-solid fa-building fa-3x text-muted"></i>

                            </div>

                        @endif

                        <div class="project-overlay">

                            <h4>
                                {{ $construction->title }}
                            </h4>

                            <p>
                                {{ $construction->location }}
                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="fa-solid fa-building fa-3x text-muted mb-3"></i>

                        <h4>
                            Aucune réalisation disponible
                        </h4>

                        <p class="text-muted">
                            Nos projets seront bientôt présentés ici.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>