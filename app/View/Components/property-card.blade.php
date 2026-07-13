<div class="card property-card border-0 shadow-sm h-100">

    <div class="position-relative">

        <img
            src="https://picsum.photos/600/400?random={{ $property->id }}"
            class="card-img-top property-image"
            alt="{{ $property->title }}">

        <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3 px-3 py-2">

            {{ $property->status == 'a_vendre' ? 'À vendre' : 'À louer' }}

        </span>

    </div>

    <div class="card-body">

        <h5 class="fw-bold mb-3">

            {{ $property->title }}

        </h5>

        <p class="text-muted">

            <i class="fa-solid fa-location-dot me-2"></i>

            {{ $property->city }}

        </p>

        <div class="d-flex justify-content-between my-4">

            <span>

                <i class="fa-solid fa-ruler-combined text-primary"></i>

                {{ $property->surface }} m²

            </span>

            <span>

                <i class="fa-solid fa-bed text-primary"></i>

                {{ $property->bedrooms }}

            </span>

            <span>

                <i class="fa-solid fa-bath text-primary"></i>

                {{ $property->bathrooms }}

            </span>

        </div>

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="text-primary fw-bold mb-0">

                {{ number_format($property->price,0,',',' ') }} FCFA

            </h4>

            <a
                href="{{ route('properties.show',$property) }}"
                class="btn btn-primary">

                Détails

            </a>

        </div>

    </div>

</div>