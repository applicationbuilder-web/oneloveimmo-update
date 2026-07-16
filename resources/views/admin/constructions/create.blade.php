@extends('layouts.admin')

@section('title', 'Ajouter une construction')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3>

                Ajouter un projet de construction

            </h3>

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

                            Titre

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

                            Localisation

                        </label>

                        <input
                            type="text"
                            name="location"
                            class="form-control"
                            value="{{ old('location') }}"
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
                            value="{{ old('type') }}"
                            placeholder="Villa, Immeuble, Bureau..."
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Statut

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="en_cours">

                                En cours

                            </option>

                            <option value="termine">

                                Terminé

                            </option>

                            <option value="a_venir">

                                À venir

                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Image

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
                            required>{{ old('description') }}</textarea>

                    </div>

                </div>

                <button
                    class="btn btn-success">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Enregistrer

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