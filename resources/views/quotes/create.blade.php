@extends('layouts.app')

@section('title', 'Demander un devis')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning">

                    <h2 class="mb-0 text-dark">

                        Demander un devis

                    </h2>

                </div>

                <div class="card-body">

                    <form
                        action="{{ route('quotes.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Nom complet

                            </label>

                            <input
                                type="text"
                                name="fullname"
                                class="form-control"
                                value="{{ old('fullname') }}"
                                required>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Téléphone

                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone') }}"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Email

                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}">

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Ville

                            </label>

                            <input
                                type="text"
                                name="city"
                                class="form-control"
                                value="{{ old('city') }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Type de projet

                            </label>

                            <select
                                name="project_type"
                                class="form-select"
                                required>

                                <option value="">Choisir...</option>

                                <option>Achat</option>

                                <option>Vente</option>

                                <option>Location</option>

                                <option>Construction</option>

                                <option>Rénovation</option>

                                <option>Architecture</option>

                                <option>Autre</option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Budget estimé (FCFA)

                            </label>

                            <input
                                type="number"
                                name="budget"
                                class="form-control">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Décrivez votre projet

                            </label>

                            <textarea
                                name="message"
                                rows="6"
                                class="form-control"
                                required>{{ old('message') }}</textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                Pièce jointe (optionnel)

                            </label>

                            <input
                                type="file"
                                name="attachment"
                                class="form-control">

                        </div>

                        <button
                            class="btn btn-warning">

                            Envoyer la demande

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection