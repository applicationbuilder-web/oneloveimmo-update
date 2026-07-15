@extends('layouts.app')

@section('title', 'À propos de OneLove Immo')

@section('content')

<!-- =========================
     Hero
========================== -->

<section class="py-5 bg-dark text-white">

    <div class="container text-center">

        <h1 class="display-4 fw-bold">

            À propos de OneLove Immo

        </h1>

        <p class="lead mt-3">

            Votre partenaire de confiance dans l'immobilier,
            la construction et l'architecture.

        </p>

    </div>

</section>

<!-- =========================
     Présentation
========================== -->

<section class="py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <img
                    src="{{ asset('assets/images/about/about.jpg') }}"
                    class="img-fluid rounded shadow"
                    alt="À propos">

            </div>

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Qui sommes-nous ?

                </h2>

                <p>

                    OneLove Immo est une entreprise spécialisée dans
                    l'immobilier, la construction, l'architecture
                    et la rénovation.

                </p>

                <p>

                    Notre objectif est d'accompagner chaque client
                    dans la réalisation de ses projets immobiliers,
                    depuis la conception jusqu'à la livraison.

                </p>

            </div>

        </div>

    </div>

</section>

@endsection

<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-bullseye fa-3x text-primary mb-3"></i>

                        <h4>Notre mission</h4>

                        <p>

                            Offrir des solutions immobilières et
                            de construction fiables, modernes
                            et accessibles.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-eye fa-3x text-success mb-3"></i>

                        <h4>Notre vision</h4>

                        <p>

                            Devenir une référence dans le secteur
                            immobilier en Afrique.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-handshake fa-3x text-warning mb-3"></i>

                        <h4>Nos valeurs</h4>

                        <p>

                            Intégrité, qualité,
                            transparence et satisfaction client.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Pourquoi nous faire confiance ?

            </h2>

        </div>

        <div class="row text-center">

            <div class="col-md-3">

                <h2 class="text-primary fw-bold">

                    120+

                </h2>

                <p>Biens vendus</p>

            </div>

            <div class="col-md-3">

                <h2 class="text-primary fw-bold">

                    80+

                </h2>

                <p>Projets réalisés</p>

            </div>

            <div class="col-md-3">

                <h2 class="text-primary fw-bold">

                    300+

                </h2>

                <p>Clients satisfaits</p>

            </div>

            <div class="col-md-3">

                <h2 class="text-primary fw-bold">

                    10+

                </h2>

                <p>Années d'expérience</p>

            </div>

        </div>

    </div>

</section>