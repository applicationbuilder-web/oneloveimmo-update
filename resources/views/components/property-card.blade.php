<div class="card h-100 shadow-sm border-0">

    @php
        $image = $property->image
            ? asset('storage/' . $property->image)
            : asset('assets/images/no-image.jpg');
    @endphp

    <img
        src="{{ $image }}"
        class="card-img-top"
        alt="{{ $property->title }}"
        style="height:250px;object-fit:cover;">

    <div class="card-body d-flex flex-column">

        <span class="badge bg-secondary mb-2 align-self-start">
            {{ $property->category?->name ?? 'Sans catégorie' }}
        </span>

        <h5 class="fw-bold">
            {{ $property->title }}
        </h5>

        <p class="text-muted mb-2">
            <i class="fa-solid fa-location-dot text-danger"></i>
            {{ $property->city }}
        </p>

        <h4 class="text-primary fw-bold mb-3">
            {{ number_format($property->price,0,',',' ') }} FCFA
        </h4>

        <div class="mb-3">

            @if($property->status=='a_vendre')

                <span class="badge bg-success">
                    À vendre
                </span>

            @else

                <span class="badge bg-warning text-dark">
                    À louer
                </span>

            @endif

        </div>

        <a
            href="{{ route('properties.show',$property) }}"
            class="btn btn-primary mt-auto w-100">

            Voir les détails

        </a>

    </div>

</div>