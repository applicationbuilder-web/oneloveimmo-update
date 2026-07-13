@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')

<div class="container-fluid py-4">

    <h1 class="mb-4">

        Tableau de bord

    </h1>

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-house fa-3x text-primary mb-3"></i>

                    <h2>3</h2>

                    <p>Biens</p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-layer-group fa-3x text-success mb-3"></i>

                    <h2>5</h2>

                    <p>Catégories</p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-building fa-3x text-warning mb-3"></i>

                    <h2>0</h2>

                    <p>Projets</p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-users fa-3x text-danger mb-3"></i>

                    <h2>1</h2>

                    <p>Utilisateurs</p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection