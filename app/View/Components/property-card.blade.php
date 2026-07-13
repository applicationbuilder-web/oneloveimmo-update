<div class="card shadow-sm border-0 rounded-4 h-100">

    <img src="https://placehold.co/600x400"
         class="card-img-top"
         alt="{{ $property->title }}">

    <div class="card-body">

        <span class="badge bg-primary mb-2">
            {{ $property->status == 'a_vendre' ? 'À vendre' : 'À louer' }}
        </span>

        <h5 class="fw-bold">
            {{ $property->title }}
        </h5>

        <p class="text-muted mb-2">
            <i class="fas fa-location-dot"></i>
            {{ $property->city }}
        </p>

        <p class="mb-3">
            {{ Str::limit($property->description, 80) }}
        </p>

        <div class="d-flex justify-content-between align-items-center">

            <strong class="text-primary">
                {{ number_format($property->price,0,',',' ') }} FCFA
            </strong>

            <a href="{{ route('properties.show',$property) }}"
               class="btn btn-outline-primary">
                Détails
            </a>

        </div>

    </div>

</div>