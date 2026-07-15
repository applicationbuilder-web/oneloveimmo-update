@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<!-- Hero -->

<section class="py-5 bg-dark text-white">

    <div class="container text-center">

        <h1 class="display-4 fw-bold">

            Contactez-nous

        </h1>

        <p class="lead">

            Nous sommes à votre écoute pour tous vos projets immobiliers.

        </p>

    </div>

</section>

<!-- Contact -->

<section class="py-5">

    <div class="container">

        <div class="row">

            <!-- Formulaire -->

            <div class="col-lg-7">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <h3 class="mb-4">

                            Envoyez-nous un message

                        </h3>

                        <form>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Nom

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

                            <button class="btn btn-primary btn-lg">

                                Envoyer

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            <!-- Coordonnées -->

            <div class="col-lg-5">

                <div class="card shadow border-0 h-100">

                    <div class="card-body p-4">

                        <h3>

                            Nos coordonnées

                        </h3>

                        <hr>

                        <p>

                            📍 Brazzaville, République du Congo

                        </p>

                        <p>

                            📞 +242 XX XX XX XX

                        </p>

                        <p>

                            📧 contact@oneloveimmo.com

                        </p>

                        <p>

                            🕒 Lundi - Samedi<br>

                            08h00 - 18h00

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection