@extends('layouts.app')

@section('title', 'Nos constructions')

@section('content')

<section class="py-5 bg-light">

    <div class="container text-center">

        <h1 class="display-4 fw-bold">

            Construisons vos rêves

        </h1>

        <p class="lead mt-3">

            OneLove Immo réalise vos projets de construction,
            rénovation et architecture avec professionnalisme.

        </p>

        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg mt-4">

            Demander un devis

        </a>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card h-100 shadow-sm">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-house fa-3x text-primary mb-3"></i>

                        <h4>Construction</h4>

                        <p>

                            Villas, maisons modernes,
                            immeubles et bâtiments professionnels.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card h-100 shadow-sm">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-compass-drafting fa-3x text-warning mb-3"></i>

                        <h4>Architecture</h4>

                        <p>

                            Plans architecturaux,
                            modélisation 3D et études techniques.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card h-100 shadow-sm">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-screwdriver-wrench fa-3x text-success mb-3"></i>

                        <h4>Rénovation</h4>

                        <p>

                            Modernisation, extension et rénovation
                            de bâtiments existants.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

<!-- =========================
     Notre processus
========================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Notre processus de réalisation

            </h2>

            <p class="text-muted">

                De votre idée jusqu'à la livraison finale.

            </p>

        </div>

        <div class="row text-center">

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="p-4">

                    <div class="display-5 fw-bold text-primary">

                        1

                    </div>

                    <h5 class="mt-3">

                        Étude du projet

                    </h5>

                    <p>

                        Analyse de vos besoins et visite du terrain.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="p-4">

                    <div class="display-5 fw-bold text-primary">

                        2

                    </div>

                    <h5 class="mt-3">

                        Conception

                    </h5>

                    <p>

                        Plans architecturaux et devis détaillé.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="p-4">

                    <div class="display-5 fw-bold text-primary">

                        3

                    </div>

                    <h5 class="mt-3">

                        Construction

                    </h5>

                    <p>

                        Réalisation des travaux selon les normes.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="p-4">

                    <div class="display-5 fw-bold text-primary">

                        4

                    </div>

                    <h5 class="mt-3">

                        Livraison

                    </h5>

                    <p>

                        Contrôle qualité et remise des clés.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     Pourquoi nous choisir
========================== -->

<section class="py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Pourquoi choisir OneLove Immo ?

                </h2>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">

                        ✅ Plus de 10 ans d'expérience

                    </li>

                    <li class="list-group-item">

                        ✅ Équipe qualifiée

                    </li>

                    <li class="list-group-item">

                        ✅ Respect des délais

                    </li>

                    <li class="list-group-item">

                        ✅ Matériaux de qualité

                    </li>

                    <li class="list-group-item">

                        ✅ Accompagnement personnalisé

                    </li>

                </ul>

            </div>

            <div class="col-lg-6 text-center">

                <img
                    src="{{ asset('assets/images/construction/construction.jpg') }}"
                    class="img-fluid rounded shadow"
                    alt="Construction">

            </div>

        </div>

    </div>

</section>


<!-- =========================
     Nos réalisations
========================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Nos réalisations

            </h2>

            <p class="text-muted">

                Quelques exemples de projets réalisés ou en cours.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="card border-0 shadow h-100">

                    <img
                        src="{{ asset('assets/images/construction/villa.jpg') }}"
                        class="card-img-top"
                        style="height:250px;object-fit:cover;"
                        alt="Villa moderne">

                    <div class="card-body">

                        <h5 class="fw-bold">

                            Villa moderne

                        </h5>

                        <p class="text-muted">

                            Construction complète d'une villa contemporaine.

                        </p>

                        <span class="badge bg-success">

                            Livré

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow h-100">

                    <img
                        src="{{ asset('assets/images/construction/immeuble.jpg') }}"
                        class="card-img-top"
                        style="height:250px;object-fit:cover;"
                        alt="Immeuble">

                    <div class="card-body">

                        <h5 class="fw-bold">

                            Immeuble résidentiel

                        </h5>

                        <p class="text-muted">

                            Résidence moderne composée de plusieurs appartements.

                        </p>

                        <span class="badge bg-warning text-dark">

                            En cours

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow h-100">

                    <img
                        src="{{ asset('assets/images/construction/renovation.jpg') }}"
                        class="card-img-top"
                        style="height:250px;object-fit:cover;"
                        alt="Rénovation">

                    <div class="card-body">

                        <h5 class="fw-bold">

                            Rénovation complète

                        </h5>

                        <p class="text-muted">

                            Transformation et modernisation d'une habitation.

                        </p>

                        <span class="badge bg-primary">

                            Terminé

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     Nos chiffres
========================== -->

<section class="py-5">

    <div class="container">

        <div class="row text-center">

            <div class="col-md-3">

                <h2 class="display-4 fw-bold text-primary">

                    120+

                </h2>

                <p>

                    Projets réalisés

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-4 fw-bold text-primary">

                    95%

                </h2>

                <p>

                    Clients satisfaits

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-4 fw-bold text-primary">

                    10+

                </h2>

                <p>

                    Années d'expérience

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-4 fw-bold text-primary">

                    24/7

                </h2>

                <p>

                    Assistance

                </p>

            </div>

        </div>

    </div>

</section>

