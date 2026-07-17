@extends('layouts.admin')

@section('title', 'Modifier un projet')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                Modifier le projet de construction

            </h4>

            <a
                href="{{ route('admin.constructions.index') }}"
                class="btn btn-secondary">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Retour

            </a>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.constructions.update', $construction) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Titre du projet

                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title', $construction->title) }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Localisation

                        </label>

                        <input
                            type="text"
                            name="location"
                            class="form-control"
                            value="{{ old('location', $construction->location) }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Type de projet

                        </label>

                        <input
                            type="text"
                            name="type"
                            class="form-control"
                            value="{{ old('type', $construction->type) }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Statut

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="en_cours"
                                {{ old('status', $construction->status) == 'en_cours' ? 'selected' : '' }}>
                                En cours
                            </option>

                            <option value="termine"
                                {{ old('status', $construction->status) == 'termine' ? 'selected' : '' }}>
                                Terminé
                            </option>

                            <option value="a_venir"
                                {{ old('status', $construction->status) == 'a_venir' ? 'selected' : '' }}>
                                À venir
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label">

                            Description

                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="form-control"
                            required>{{ old('description', $construction->description) }}</textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nouvelle image

                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control">

                        <small class="text-muted">

                            Laissez vide pour conserver l'image actuelle.

                        </small>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Image actuelle

                        </label>

                        <div>

                            @if($construction->image)

                                <img
                                    src="{{ asset('storage/'.$construction->image) }}"
                                    class="img-fluid rounded shadow"
                                    style="max-height:220px">

                            @else

                                <div class="alert alert-light border">

                                    Aucune image disponible.

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-warning">

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Mettre à jour

                    </button>

                    <a
                        href="{{ route('admin.constructions.index') }}"
                        class="btn btn-outline-secondary">

                        Annuler

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection