@extends('layouts.admin')

@section('title', 'Modifier la catégorie ' . $category->name)
@section('page-title', 'Modifier une catégorie')
@section('page-subtitle', 'Mettre à jour les informations de « ' . $category->name . ' »')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8 col-xl-7">

        {{-- Barre supérieure d'action --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.categories.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux catégories
            </a>

            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="adm-btn adm-btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    Supprimer
                </button>
            </form>
        </div>

        {{-- Formulaire --}}
        <div class="adm-card">
            <div class="adm-card-header d-flex align-items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-primary"></i>
                <span class="fw-bold" style="color:#0d1b2a;">Modifier la catégorie #{{ $category->id }}</span>
            </div>

            <div class="adm-card-body p-4">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nom --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="color:#1e293b;">
                            Nom de la catégorie <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $category->name) }}"
                            required
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="Ex : Villa, Appartement, Terrain..."
                            style="border-radius:10px;font-size:15px;">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Icône --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="color:#1e293b;">
                            Icône Font Awesome
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light" id="iconPreview" style="border-radius:10px 0 0 10px;width:50px;justify-content:center;">
                                <i class="fa-solid {{ old('icon', $category->icon) ?: 'fa-folder' }}"></i>
                            </span>
                            <input
                                type="text"
                                name="icon"
                                id="iconInput"
                                value="{{ old('icon', $category->icon) }}"
                                class="form-control @error('icon') is-invalid @enderror"
                                placeholder="Ex : fa-house, fa-building..."
                                style="border-radius:0 10px 10px 0;">
                        </div>
                        <div class="form-text text-muted mt-2">
                            Exemples courants : <code>fa-house</code>, <code>fa-building</code>, <code>fa-tree</code>, <code>fa-landmark</code>, <code>fa-city</code>, <code>fa-store</code>.
                        </div>
                        @error('icon')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="color:#1e293b;">
                            Description (optionnelle)
                        </label>
                        <textarea
                            name="description"
                            rows="4"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Décrivez les types de biens appartenant à cette catégorie..."
                            style="border-radius:10px;">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Boutons d'action --}}
                    <div class="d-flex flex-column-reverse flex-sm-row justify-content-sm-end gap-2 gap-sm-3 pt-3 border-top">
                        <a href="{{ route('admin.categories.index') }}" class="adm-btn adm-btn-outline adm-btn-responsive">
                            Annuler
                        </a>
                        <button type="submit" class="adm-btn adm-btn-primary adm-btn-responsive">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Mettre à jour la catégorie
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    const iconInput = document.getElementById('iconInput');
    const iconPreview = document.getElementById('iconPreview');

    if (iconInput && iconPreview) {
        iconInput.addEventListener('input', function() {
            const val = this.value.trim() || 'fa-folder';
            iconPreview.innerHTML = `<i class="fa-solid ${val}"></i>`;
        });
    }
</script>
@endpush

@endsection