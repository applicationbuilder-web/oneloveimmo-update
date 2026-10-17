@extends('layouts.admin')

@section('title', 'Ajouter un bien immobilier')
@section('page-title', 'Nouveau bien immobilier')
@section('page-subtitle', 'Enregistrez un bien à la vente ou à la location dans le catalogue')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9">

        {{-- Barre supérieure d'action --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.properties.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux biens
            </a>
        </div>

        {{-- Formulaire --}}
        <div class="adm-card">
            <div class="adm-card-header d-flex align-items-center gap-2">
                <i class="fa-solid fa-house-chimney text-primary"></i>
                <span class="fw-bold" style="color:#0d1b2a;">Formulaire d'enregistrement du bien</span>
            </div>

            <div class="adm-card-body p-4">
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- SECTION 1 : Infos Générales --}}
                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold text-muted small mb-3 pb-2 border-bottom">
                            1. Informations générales
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Titre de l'annonce <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title') }}"
                                    required
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    placeholder="Ex : Superbe Villa Duplex 5 Pièces avec Piscine"
                                    style="border-radius:10px;font-size:15px;">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Catégorie <span class="text-danger">*</span>
                                </label>
                                <select name="category_id" required class="form-select form-select-lg @error('category_id') is-invalid @enderror" style="border-radius:10px;font-size:14px;">
                                    <option value="">-- Choisir une catégorie --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Type de transaction <span class="text-danger">*</span>
                                </label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" style="border-radius:10px;">
                                    <option value="a_vendre" {{ old('status', 'a_vendre') == 'a_vendre' ? 'selected' : '' }}>À vendre</option>
                                    <option value="a_louer" {{ old('status') == 'a_louer' ? 'selected' : '' }}>À louer</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Sous-type / Désignation
                                </label>
                                <input
                                    type="text"
                                    name="type"
                                    value="{{ old('type') }}"
                                    class="form-control @error('type') is-invalid @enderror"
                                    placeholder="Ex : Villa plain-pied, Duplex, F3, Terrain titré..."
                                    style="border-radius:10px;">
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check p-3 rounded" style="background:#f8fafc;border:1px solid #e2e8f0;">
                                    <input
                                        type="checkbox"
                                        class="form-check-input ms-0 me-2"
                                        id="featured"
                                        name="featured"
                                        value="1"
                                        {{ old('featured') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-semibold" for="featured" style="cursor:pointer;color:#0d1b2a;">
                                        ⭐ Mettre ce bien en vedette (affiché en priorité sur la page d'accueil)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 2 : Localisation & Prix --}}
                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold text-muted small mb-3 pb-2 border-bottom">
                            2. Localisation & Prix
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Ville <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    name="city"
                                    value="{{ old('city', 'Brazzaville') }}"
                                    required
                                    class="form-control @error('city') is-invalid @enderror"
                                    placeholder="Ex : Brazzaville, Pointe-Noire"
                                    style="border-radius:10px;">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Adresse / Quartier
                                </label>
                                <input
                                    type="text"
                                    name="address"
                                    value="{{ old('address') }}"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Ex : Centre-ville, Mpila, Moungali..."
                                    style="border-radius:10px;">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Prix (FCFA) <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input
                                        type="number"
                                        name="price"
                                        value="{{ old('price') }}"
                                        required
                                        min="0"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Ex : 45000000"
                                        style="border-radius:10px 0 0 10px;">
                                    <span class="input-group-text bg-light fw-bold" style="border-radius:0 10px 10px 0;font-size:13px;">FCFA</span>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 3 : Caractéristiques --}}
                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold text-muted small mb-3 pb-2 border-bottom">
                            3. Caractéristiques techniques
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Surface habitable (m²)
                                </label>
                                <div class="input-group">
                                    <input
                                        type="number"
                                        name="surface"
                                        value="{{ old('surface') }}"
                                        min="0"
                                        class="form-control @error('surface') is-invalid @enderror"
                                        placeholder="Ex : 250"
                                        style="border-radius:10px 0 0 10px;">
                                    <span class="input-group-text bg-light" style="border-radius:0 10px 10px 0;">m²</span>
                                </div>
                                @error('surface')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Nombre de chambres
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fa-solid fa-bed text-warning"></i></span>
                                    <input
                                        type="number"
                                        name="bedrooms"
                                        value="{{ old('bedrooms') }}"
                                        min="0"
                                        class="form-control @error('bedrooms') is-invalid @enderror"
                                        placeholder="Ex : 4"
                                        style="border-radius:0 10px 10px 0;">
                                </div>
                                @error('bedrooms')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Salles de bain
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fa-solid fa-bath text-info"></i></span>
                                    <input
                                        type="number"
                                        name="bathrooms"
                                        value="{{ old('bathrooms') }}"
                                        min="0"
                                        class="form-control @error('bathrooms') is-invalid @enderror"
                                        placeholder="Ex : 3"
                                        style="border-radius:0 10px 10px 0;">
                                </div>
                                @error('bathrooms')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 4 : Photo & Description --}}
                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold text-muted small mb-3 pb-2 border-bottom">
                            4. Photo de couverture & Description
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Photo principale
                                </label>
                                <input
                                    type="file"
                                    name="image"
                                    id="propertyImageInput"
                                    accept="image/*"
                                    class="form-control @error('image') is-invalid @enderror"
                                    style="border-radius:10px;">
                                <div class="form-text text-muted">Formats acceptés : JPG, PNG, WEBP (Max 2 Mo).</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div id="previewContainer" style="display:none;">
                                    <label class="form-label fw-semibold text-muted small">Aperçu photo</label>
                                    <div style="width:160px;height:100px;border-radius:10px;overflow:hidden;border:2px solid var(--adm-primary);">
                                        <img id="imagePreview" src="" alt="Aperçu" style="width:100%;height:100%;object-fit:cover;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold" style="color:#1e293b;">
                                    Description détaillée du bien
                                </label>
                                <textarea
                                    name="description"
                                    rows="6"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Décrivez les atouts, équipements (groupe électrogène, forage, garage, jardin...), commodités et environnement du bien..."
                                    style="border-radius:10px;">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Boutons --}}
                    <div class="d-flex flex-column-reverse flex-sm-row justify-content-sm-end gap-2 gap-sm-3 pt-4 border-top">
                        <a href="{{ route('admin.properties.index') }}" class="adm-btn adm-btn-outline adm-btn-responsive">
                            Annuler
                        </a>
                        <button type="submit" class="adm-btn adm-btn-primary adm-btn-responsive">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Enregistrer le bien immobilier
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    const input = document.getElementById('propertyImageInput');
    const container = document.getElementById('previewContainer');
    const preview = document.getElementById('imagePreview');

    if (input && preview) {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                container.style.display = 'none';
            }
        });
    }
</script>
@endpush

@endsection