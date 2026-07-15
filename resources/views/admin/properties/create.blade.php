@extends('layouts.admin')

@section('title', 'Ajouter un bien')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Ajouter un bien immobilier
            </h2>

            <p class="text-muted mb-0">
                Remplissez les informations du bien immobilier.
            </p>

        </div>

        <a href="{{ route('admin.properties.index') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-2"></i>

            Retour

        </a>

    </div>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <form action="{{ route('admin.properties.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Titre -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Titre <span class="text-danger">*</span>

                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Ex : Villa moderne avec piscine"
                            required>

                        @error('title')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- Catégorie -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Catégorie <span class="text-danger">*</span>

                        </label>

                        <select
                            name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror"
                            required>

                            <option value="">

                                -- Choisir une catégorie --

                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('category_id')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- Type -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Type

                        </label>

                        <input
                            type="text"
                            name="type"
                            value="{{ old('type') }}"
                            class="form-control"
                            placeholder="Villa, Appartement, Terrain...">

                    </div>

                    <!-- Ville -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Ville

                        </label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city') }}"
                            class="form-control"
                            placeholder="Brazzaville">

                    </div>

                    <!-- Adresse -->
                    <div class="col-12 mb-3">

                        <label class="form-label">

                            Adresse

                        </label>

                        <input
                            type="text"
                            name="address"
                            value="{{ old('address') }}"
                            class="form-control"
                            placeholder="Adresse complète">

                    </div>

                    <!-- Prix -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Prix (FCFA)

                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price') }}"
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
                            value="{{ old('surface') }}"
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
                            value="{{ old('bedrooms') }}"
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
                            value="{{ old('bathrooms') }}"
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

                            <option value="a_vendre"
                                {{ old('status') == 'a_vendre' ? 'selected' : '' }}>

                                À vendre

                            </option>

                            <option value="a_louer"
                                {{ old('status') == 'a_louer' ? 'selected' : '' }}>

                                À louer

                            </option>

                        </select>

                    </div>

                    <!-- Bien en vedette -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Options

                        </label>

                        <div class="form-check mt-2">

                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="featured"
                                name="featured"
                                value="1"
                                {{ old('featured') ? 'checked' : '' }}>

                            <label
                                class="form-check-label"
                                for="featured">

                                Afficher ce bien en vedette

                            </label>

                        </div>

                    </div>

                    <!-- Image -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Image principale

                        </label>

                        <input
                            type="file"
                            name="image"
                            id="imageInput"
                            class="form-control"
                            accept="image/*">

                        <img
                            id="previewImage"
                            src="#"
                            class="img-fluid rounded mt-3 shadow"
                            style="display:none;max-height:220px;">

                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-4">

                        <label class="form-label">

                            Description

                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="form-control"
                            placeholder="Décrivez le bien immobilier...">{{ old('description') }}</textarea>

                    </div>

                </div>

                <button
                    class="btn btn-success">

                    <i class="fa-solid fa-floppy-disk me-2"></i>

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

@push('scripts')

<script>

document.getElementById('imageInput').addEventListener('change', function(e){

    if(e.target.files.length > 0){

        const reader = new FileReader();

        reader.onload = function(event){

            const preview = document.getElementById('previewImage');

            preview.src = event.target.result;

            preview.style.display = 'block';

        };

        reader.readAsDataURL(e.target.files[0]);

    }

});

</script>

@endpush

@endsection