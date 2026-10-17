<section class="search-section py-4 py-lg-5">
    <div class="container">

        <div class="search-card card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4 p-lg-5">

                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold me-2">
                        <i class="fas fa-magnifying-glass me-1"></i> Recherche rapide
                    </span>
                    <span class="text-muted small">Trouvez le bien qui correspond à vos critères</span>
                </div>

                <form action="{{ route('properties.index') }}" method="GET">

                    <div class="row g-3 align-items-end">

                        {{-- Ville --}}
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="form-label fw-semibold text-secondary-emphasis small mb-2">
                                <i class="fa-solid fa-location-dot text-primary me-1"></i> Ville ou quartier
                            </label>

                            <div class="input-group search-input-group">
                                <span class="input-group-text bg-light border-0 ps-3">
                                    <i class="fa-solid fa-map-pin text-muted"></i>
                                </span>
                                <input
                                    type="text"
                                    name="city"
                                    class="form-control form-control-lg bg-light border-0 ps-2"
                                    placeholder="Ex : Brazzaville, Pointe-Noire...">
                            </div>
                        </div>

                        {{-- Type de bien --}}
                        <div class="col-12 col-md-6 col-lg-3">
                            <label class="form-label fw-semibold text-secondary-emphasis small mb-2">
                                <i class="fa-solid fa-house-chimney text-primary me-1"></i> Type de bien
                            </label>

                            <div class="input-group search-input-group">
                                <span class="input-group-text bg-light border-0 ps-3">
                                    <i class="fa-solid fa-layer-group text-muted"></i>
                                </span>
                                <select name="type" class="form-select form-control-lg bg-light border-0 ps-2">
                                    <option value="">Tous types</option>
                                    <option value="Maison">Maison</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Appartement">Appartement</option>
                                    <option value="Terrain">Terrain</option>
                                    <option value="Immeuble">Immeuble</option>
                                </select>
                            </div>
                        </div>

                        {{-- Budget max --}}
                        <div class="col-12 col-md-6 col-lg-3">
                            <label class="form-label fw-semibold text-secondary-emphasis small mb-2">
                                <i class="fa-solid fa-coins text-warning me-1"></i> Budget max (FCFA)
                            </label>

                            <div class="input-group search-input-group">
                                <span class="input-group-text bg-light border-0 ps-3">
                                    <i class="fa-solid fa-wallet text-muted"></i>
                                </span>
                                <input
                                    type="number"
                                    name="budget"
                                    class="form-control form-control-lg bg-light border-0 ps-2"
                                    placeholder="Ex : 50 000 000">
                            </div>
                        </div>

                        {{-- Bouton Rechercher --}}
                        <div class="col-12 col-md-6 col-lg-2 d-grid">
                            <button
                                type="submit"
                                class="btn btn-warning btn-lg fw-bold search-submit-btn shadow-sm">
                                <i class="fas fa-search me-2"></i>
                                Rechercher
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>
</section>