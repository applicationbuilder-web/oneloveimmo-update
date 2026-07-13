@extends('layouts.app')

@section('title', 'Nos biens immobiliers')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold">Nos biens immobiliers</h1>
            <p class="text-muted mb-0">
                Découvrez notre sélection de biens disponibles à la vente et à la location.
            </p>
        </div>
    </div>

    <div class="row g-4">

        @forelse ($properties as $property)

            <div class="col-12 col-md-6 col-lg-4">

                <x-property-card :property="$property" />

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info text-center">

                    <h5 class="mb-2">
                        Aucun bien disponible
                    </h5>

                    <p class="mb-0">
                        Les biens immobiliers apparaîtront ici dès qu'ils seront ajoutés.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection