@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Tableau de bord
            </h2>

            <p class="text-muted mb-0">
                Bienvenue dans l'administration de OneLove Immo.
            </p>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <i class="fa-solid fa-house fa-3x text-primary mb-3"></i>

                    <h2 class="fw-bold">
                        {{ $totalProperties }}
                    </h2>

                    <p class="text-muted mb-0">
                        Biens immobiliers
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <i class="fa-solid fa-layer-group fa-3x text-success mb-3"></i>

                    <h2 class="fw-bold">
                        {{ $totalCategories }}
                    </h2>

                    <p class="text-muted mb-0">
                        Catégories
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <i class="fa-solid fa-building fa-3x text-warning mb-3"></i>

                    <h2 class="fw-bold">
                        {{ $totalProjects }}
                    </h2>

                    <p class="text-muted mb-0">
                        Projets de construction
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <i class="fa-solid fa-users fa-3x text-danger mb-3"></i>

                    <h2 class="fw-bold">
                        {{ $totalUsers }}
                    </h2>

                    <p class="text-muted mb-0">
                        Utilisateurs
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection