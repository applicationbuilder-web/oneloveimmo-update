@extends('layouts.admin')

@section('title', 'Ajouter un projet de construction')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                Ajouter un projet de construction

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
                action="{{ route('admin.constructions.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Titre du projet <span class="text-danger">*</span>

                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Localisation <span class="text-danger">*</span>

                        </label>

                        <input
                            type="text"
                            name="location"
                            class="form-control"
                            value="{{ old('location') }}"
                            placeholder="Brazzaville, Pointe-Noire..."
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Type de projet <span class="text-danger">*</span>

                        </label>

                        <input
                            type="text"
                            name="type"
                            class="form-control"
                            value="{{ old('type') }}"
                            placeholder="Villa, Immeuble, Résidence..."
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
                                {{ old('status') == 'en_cours' ? 'selected' : '' }}>
                                En cours
                            </option>

                            <option value="termine"
                                {{ old('status') == 'termine' ? 'selected' : '' }}>
                                Terminé
                            </option>

                            <option value="a_venir"
                                {{ old('status') == 'a_venir' ? 'selected' : '' }}>
                                À venir
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Image du projet

                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">

                            Formats autorisés : JPG, JPEG, PNG, WEBP.

                        </small>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label">

                            Description <span class="text-danger">*</span>

                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="form-control"
                            required>{{ old('description') }}</textarea>

                    </div>

                </div>

                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Enregistrer

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