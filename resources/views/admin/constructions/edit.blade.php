@extends('layouts.admin')

@section('title', 'Modifier une construction')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3>

                Modifier un projet de construction

            </h3>

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

                            Titre

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

                            <option
                                value="en_cours"
                                {{ old('status', $construction->status) == 'en_cours' ? 'selected' : '' }}>

                                En cours

                            </option>

                            <option
                                value="termine"
                                {{ old('status', $construction->status) == 'termine' ? 'selected' : '' }}>

                                Terminé

                            </option>

                            <option
                                value="a_venir"
                                {{ old('status', $construction->status) == 'a_venir' ? 'selected' : '' }}>

                                À venir

                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Image actuelle

                        </label>

                        <br>

                        @if($construction->image)

                            <img
                                src="{{ asset('storage/' . $construction->image) }}"
                                class="img-thumbnail mb-3"
                                width="220">

                        @else

                            <p class="text-muted">

                                Aucune image.

                            </p>

                        @endif

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Nouvelle image

                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control">

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

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Mettre à jour

                </button>

                <a
                    href="{{ route('admin.constructions.index') }}"
                    class="btn btn-secondary">

                    Annuler

                </a>

            </form>

        </div>

    </div>

</div>

@endsection