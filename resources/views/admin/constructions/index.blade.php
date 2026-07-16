@extends('layouts.app')

@section('title', 'Nos constructions')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">

            Nos réalisations

        </h1>

        <p class="text-muted">

            Découvrez quelques projets réalisés par OneLove Immo.

        </p>

    </div>

    <div class="row g-4">

        @forelse($constructions as $construction)

            <div class="col-lg-4 col-md-6">

                <div class="card h-100 shadow-sm border-0">

                    @if($construction->image)

                        <img
                            src="{{ asset('storage/'.$construction->image) }}"
                            class="card-img-top"
                            style="height:250px;object-fit:cover;">

                    @else

                        <img
                            src="{{ asset('assets/images/no-image.jpg') }}"
                            class="card-img-top"
                            style="height:250px;object-fit:cover;">

                    @endif

                    <div class="card-body">

                        <h5 class="fw-bold">

                            {{ $construction->title }}

                        </h5>

                        <p class="text-muted mb-2">

                            <i class="fa-solid fa-location-dot text-danger"></i>

                            {{ $construction->location }}

                        </p>

                        <span class="badge bg-primary mb-3">

                            {{ $construction->type }}

                        </span>

                        <p>

                            {{ Str::limit($construction->description,120) }}

                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info text-center">

                    Aucun projet disponible.

                </div>

            </div>

        @endforelse

    </div>

    <div class="mt-5">

        {{ $constructions->links() }}

    </div>

</div>

@endsection