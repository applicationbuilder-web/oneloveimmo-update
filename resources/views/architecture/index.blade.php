@extends('layouts.app')

@section('title', 'Construction')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h1 class="fw-bold">
                Nos Services de Construction
            </h1>

            <p class="text-muted">
                Nous réalisons vos projets de construction avec qualité, sécurité et professionnalisme.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-house fa-3x text-primary mb-3"></i>

                        <h4>Construction de Villas</h4>

                        <p>
                            Villas modernes, contemporaines ou personnalisées selon vos besoins.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-building fa-3x text-primary mb-3"></i>

                        <h4>Immeubles</h4>

                        <p>
                            Construction d'immeubles résidentiels et commerciaux.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-helmet-safety fa-3x text-primary mb-3"></i>

                        <h4>Suivi de Chantier</h4>

                        <p>
                            Accompagnement de votre projet du début jusqu'à la livraison.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection