@extends('layouts.admin')

@section('title', 'Nouveau chantier')
@section('page-title', 'Ajouter un projet de construction')
@section('page-subtitle', 'Enregistrez un nouveau chantier ou une réalisation pour la vitrine')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9 col-xl-8">

        {{-- Barre supérieure d'action --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.constructions.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux chantiers
            </a>
        </div>

        {{-- Formulaire --}}
        <div class="adm-card">
            <div class="adm-card-header d-flex align-items-center gap-2">
                <i class="fa-solid fa-building text-warning"></i>
                <span class="fw-bold" style="color:#0d1b2a;">Informations du projet</span>
            </div>

            <div class="adm-card-body p-4">
                <form action="{{ route('admin.constructions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        {{-- Titre --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Titre du projet <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                                placeholder="Ex : Villa Duplex Moderne Maya-Maya"
                                style="border-radius:10px;font-size:15px;">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Localisation --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Localisation / Ville <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-location-dot text-danger"></i></span>
                                <input
                                    type="text"
                                    name="location"
                                    value="{{ old('location') }}"
                                    required
                                    class="form-control @error('location') is-invalid @enderror"
                                    placeholder="Ex : Brazzaville, Bacongo"
                                    style="border-radius:0 10px 10px 0;">
                            </div>
                            @error('location')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Type de projet --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Type de projet <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="type"
                                value="{{ old('type') }}"
                                required
                                class="form-control @error('type') is-invalid @enderror"
                                placeholder="Ex : Villa de luxe, Immeuble R+3, Rénovation..."
                                style="border-radius:10px;">
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Statut --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Statut du chantier <span class="text-danger">*</span>
                            </label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" style="border-radius:10px;">
                                <option value="en_cours" {{ old('status', 'en_cours') == 'en_cours' ? 'selected' : '' }}>En cours de réalisation</option>
                                <option value="termine" {{ old('status') == 'termine' ? 'selected' : '' }}>Projet terminé (Réalisé)</option>
                                <option value="a_venir" {{ old('status') == 'a_venir' ? 'selected' : '' }}>À venir / En planification</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image du projet --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Photo / Image de couverture
                            </label>
                            <input
                                type="file"
                                name="image"
                                id="imageInput"
                                accept="image/*"
                                class="form-control @error('image') is-invalid @enderror"
                                style="border-radius:10px;">
                            <div class="form-text text-muted">Formats acceptés : JPG, PNG, WEBP (Max 2 Mo).</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Prévisualisation de l'image --}}
                        <div class="col-12" id="previewContainer" style="display:none;">
                            <label class="form-label fw-semibold text-muted small">Aperçu de l'image sélectionnée</label>
                            <div style="width:200px;height:140px;border-radius:10px;overflow:hidden;border:1px solid #cbd5e1;">
                                <img id="imagePreview" src="" alt="Aperçu" style="width:100%;height:100%;object-fit:cover;">
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Description détaillée du chantier <span class="text-danger">*</span>
                            </label>
                            <textarea
                                name="description"
                                rows="6"
                                required
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Présentez les détails, caractéristiques techniques, superficie et étapes du chantier..."
                                style="border-radius:10px;">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Boutons --}}
                    <div class="d-flex flex-column-reverse flex-sm-row justify-content-sm-end gap-2 gap-sm-3 pt-4 mt-4 border-top">
                        <a href="{{ route('admin.constructions.index') }}" class="adm-btn adm-btn-outline adm-btn-responsive">
                            Annuler
                        </a>
                        <button type="submit" class="adm-btn adm-btn-primary adm-btn-responsive">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Enregistrer le projet
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    const input = document.getElementById('imageInput');
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