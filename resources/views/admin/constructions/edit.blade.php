@extends('layouts.admin')

@section('title', 'Modifier le chantier : ' . $construction->title)
@section('page-title', 'Modifier le chantier')
@section('page-subtitle', 'Mettre à jour les informations du projet « ' . $construction->title . ' »')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9 col-xl-8">

        {{-- Actions supérieures --}}
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-4 gap-3">
            <a href="{{ route('admin.constructions.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux chantiers
            </a>

            <div class="d-flex align-items-center flex-wrap gap-2">
                <a href="{{ route('admin.constructions.show', $construction) }}" class="adm-btn adm-btn-outline">
                    <i class="fa-solid fa-eye"></i> Voir les détails
                </a>
                <form action="{{ route('admin.constructions.destroy', $construction) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression de ce projet ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="adm-btn adm-btn-danger">
                        <i class="fa-solid fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>

        {{-- Formulaire --}}
        <div class="adm-card">
            <div class="adm-card-header d-flex align-items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-warning"></i>
                <span class="fw-bold" style="color:#0d1b2a;">Modifier le projet #{{ $construction->id }}</span>
            </div>

            <div class="adm-card-body p-4">
                <form action="{{ route('admin.constructions.update', $construction) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        {{-- Titre --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Titre du projet <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="title"
                                value="{{ old('title', $construction->title) }}"
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
                                    value="{{ old('location', $construction->location) }}"
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
                                value="{{ old('type', $construction->type) }}"
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
                                <option value="en_cours" {{ old('status', $construction->status) == 'en_cours' ? 'selected' : '' }}>En cours de réalisation</option>
                                <option value="termine" {{ old('status', $construction->status) == 'termine' ? 'selected' : '' }}>Projet terminé (Réalisé)</option>
                                <option value="a_venir" {{ old('status', $construction->status) == 'a_venir' ? 'selected' : '' }}>À venir / En planification</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image actuelle et changement --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="color:#1e293b;">
                                Image du projet
                            </label>
                            <input
                                type="file"
                                name="image"
                                id="imageInput"
                                accept="image/*"
                                class="form-control @error('image') is-invalid @enderror"
                                style="border-radius:10px;">
                            <div class="form-text text-muted">Laissez vide pour conserver l'image actuelle.</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Aperçu image actuelle / nouvelle --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-4 p-3" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;">
                                @if($construction->image)
                                    <div>
                                        <div class="text-muted small fw-semibold mb-1">Image actuelle :</div>
                                        <img src="{{ asset('storage/' . $construction->image) }}" alt="Actuelle" style="width:140px;height:95px;object-fit:cover;border-radius:8px;border:1px solid #cbd5e1;">
                                    </div>
                                @endif
                                <div id="previewContainer" style="display:none;">
                                    <div class="text-primary small fw-semibold mb-1">Nouvelle image sélectionnée :</div>
                                    <img id="imagePreview" src="" alt="Aperçu" style="width:140px;height:95px;object-fit:cover;border-radius:8px;border:2px solid var(--adm-primary);">
                                </div>
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
                                style="border-radius:10px;">{{ old('description', $construction->description) }}</textarea>
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
                            Mettre à jour le projet
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