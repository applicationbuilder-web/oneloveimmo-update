<div class="property-card card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative">

    @php
        $image = $property->image
            ? asset('storage/' . $property->image)
            : asset('assets/images/no-image.jpg');
    @endphp

    {{-- Conteneur Image avec Badges flottants --}}
    <div class="property-image-wrapper position-relative overflow-hidden">
        <img
            src="{{ $image }}"
            class="card-img-top property-image"
            alt="{{ $property->title }}"
            loading="lazy">

        {{-- Badge Statut (À vendre / À louer) --}}
        <div class="position-absolute top-0 start-0 m-3">
            @if($property->status == 'a_vendre')
                <span class="badge bg-success px-3 py-2 rounded-pill shadow-sm fw-semibold">
                    <i class="fa-solid fa-tag me-1"></i> À vendre
                </span>
            @else
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm fw-semibold">
                    <i class="fa-solid fa-key me-1"></i> À louer
                </span>
            @endif
        </div>

        {{-- Badge Catégorie --}}
        <div class="position-absolute bottom-0 start-0 m-3">
            <span class="badge bg-dark bg-opacity-75 text-white px-3 py-2 rounded-pill shadow-sm backdrop-blur">
                <i class="fa-solid fa-layer-group me-1"></i>
                {{ $property->category?->name ?? 'Immobilier' }}
            </span>
        </div>
    </div>

    {{-- Contenu de la Carte --}}
    <div class="card-body p-4 d-flex flex-column">

        <p class="text-muted small mb-2 d-flex align-items-center">
            <i class="fa-solid fa-location-dot text-danger me-1"></i>
            <span class="text-truncate">{{ $property->city }}</span>
        </p>

        <h5 class="fw-bold text-dark mb-2 text-truncate-2" title="{{ $property->title }}">
            {{ $property->title }}
        </h5>

        <div class="mt-2 mb-4">
            <span class="text-muted small">Prix</span>
            <h4 class="text-primary fw-bold mb-0">
                {{ number_format($property->price, 0, ',', ' ') }} <small class="fs-6 text-secondary-emphasis">FCFA</small>
            </h4>
        </div>

        <a
            href="{{ route('properties.show', $property) }}"
            class="btn btn-outline-primary rounded-pill mt-auto w-100 py-2 fw-semibold property-btn d-flex align-items-center justify-content-center gap-2">
            <span>Voir les détails</span>
            <i class="fa-solid fa-arrow-right-long transition-icon"></i>
        </a>

    </div>

</div>