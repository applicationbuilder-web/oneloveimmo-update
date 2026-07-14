@extends('layouts.admin')

@section('title', 'Ajouter un bien')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h3>Ajouter un bien immobilier</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.properties.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Titre -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Titre</label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title') }}"
                               required>
                    </div>

                    <!-- Catégorie -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Catégorie</label>

                        <select name="category_id"
                                class="form-select"
                                required>

                            <option value="">Choisir...</option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Type -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Type</label>

                        <input
                            type="text"
                            name="type"
                            class="form-control">

                    </div>

                    <!-- Ville -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Ville</label>

                        <input
                            type="text"
                            name="city"
                            class="form-control">

                    </div>

                    <!-- Adresse -->
                    <div class="col-12 mb-3">

                        <label class="form-label">Adresse</label>

                        <input
                            type="text"
                            name="address"
                            class="form-control">

                    </div>

                    <!-- Prix -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Prix (FCFA)

                        </label>

                        <input
                            type="number"
                            name="price"
                            class="form-control">

                    </div>

                    <!-- Surface -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Surface (m²)

                        </label>

                        <input
                            type="number"
                            name="surface"
                            class="form-control">

                    </div>

                    <!-- Chambres -->
                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            Chambres

                        </label>

                        <input
                            type="number"
                            name="bedrooms"
                            class="form-control">

                    </div>

                    <!-- Salles de bain -->
                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            Salles de bain

                        </label>

                        <input
                            type="number"
                            name="bathrooms"
                            class="form-control">

                    </div>

                    <!-- Statut -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Statut

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="a_vendre">

                                À vendre

                            </option>

                            <option value="a_louer">

                                À louer

                            </option>

                        </select>

                    </div>

                    <!-- Image -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Image

                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control">

                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-4">

                        <label class="form-label">

                            Description

                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="form-control"></textarea>

                    </div>

                </div>

                <button class="btn btn-success">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Enregistrer

                </button>

                <a href="{{ route('admin.properties.index') }}"
                   class="btn btn-secondary">

                    Annuler

                </a>

            </form>

        </div>

    </div>

</div>

@endsection