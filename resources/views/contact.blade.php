@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h1 class="fw-bold">
                Contactez-nous
            </h1>

            <p class="text-muted">
                Notre équipe est à votre disposition pour répondre à toutes vos questions.
            </p>

        </div>

        <div class="row g-5">

            <!-- Informations -->

            <div class="col-lg-5">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body p-4">

                        <h3 class="mb-4">
                            Nos coordonnées
                        </h3>

                        <p>
                            <i class="fa-solid fa-location-dot text-warning me-2"></i>
                            Brazzaville, République du Congo
                        </p>

                        <p>
                            <i class="fa-solid fa-phone text-warning me-2"></i>
                            +242 XX XXX XX XX
                        </p>

                        <p>
                            <i class="fa-solid fa-envelope text-warning me-2"></i>
                            contact@oneloveimmo.com
                        </p>

                        <hr>

                        <h5 class="mb-3">
                            Horaires
                        </h5>

                        <p class="mb-1">
                            Lundi - Vendredi : 08h00 - 18h00
                        </p>

                        <p>
                            Samedi : 08h00 - 13h00
                        </p>

                    </div>

                </div>

            </div>

            <!-- Formulaire -->

            <div class="col-lg-7">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4">

                        <h3 class="mb-4">
                            Envoyez-nous un message
                        </h3>

                        <form>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Nom complet
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Téléphone
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    class="form-control">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Sujet
                                </label>

                                <input
                                    type="text"
                                    class="form-control">

                            </div>

                            <div class="mb-4">

                                <label class="form-label">
                                    Message
                                </label>

                                <textarea
                                    rows="6"
                                    class="form-control"></textarea>

                            </div>

                            <button
                                class="btn btn-warning px-4">

                                <i class="fa-solid fa-paper-plane me-2"></i>

                                Envoyer

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection