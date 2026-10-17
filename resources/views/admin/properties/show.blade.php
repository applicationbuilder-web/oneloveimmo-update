@extends('layouts.admin')

@section('title', 'Bien : ' . $property->title)
@section('page-title', 'Détails du bien immobilier')
@section('page-subtitle', 'Fiche complète de « ' . $property->title . ' »')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9">

        {{-- Barre supérieure d'action --}}
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-4 gap-3">
            <a href="{{ route('admin.properties.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux biens
            </a>

            <div class="d-flex align-items-center flex-wrap gap-2">
                <a href="{{ route('admin.properties.edit', $property) }}" class="adm-btn adm-btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Modifier le bien
                </a>

                <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression définitive de ce bien immobilier ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="adm-btn adm-btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        {{-- Carte principale --}}
        <div class="adm-card">
            {{-- En-tête --}}
            <div class="adm-card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div style="width:46px;height:46px;border-radius:12px;background:linear-gradient(135deg,var(--adm-primary),var(--adm-primary-light));color:#fff;display:flex;align-items:center;justify-content:center;font-size:20px;">
                        <i class="fa-solid fa-house-chimney"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:#0d1b2a;">{{ $property->title }}</h5>
                        <div class="d-flex align-items-center gap-2 text-muted small mt-1">
                            <span><i class="fa-solid fa-layer-group text-primary me-1"></i> {{ $property->category?->name ?? 'Sans catégorie' }}</span>
                            <span>•</span>
                            <span><i class="fa-solid fa-location-dot text-danger me-1"></i> {{ $property->city }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    @if($property->featured)
                        <span class="adm-badge adm-badge-warning" style="font-size:12px;padding:6px 12px;">
                            <i class="fa-solid fa-star"></i> En vedette
                        </span>
                    @endif

                    @if($property->status === 'a_vendre')
                        <span class="adm-badge adm-badge-success" style="font-size:12px;padding:6px 12px;">
                            <i class="fa-solid fa-tag"></i> À vendre
                        </span>
                    @else
                        <span class="adm-badge adm-badge-info" style="font-size:12px;padding:6px 12px;">
                            <i class="fa-solid fa-key"></i> À louer
                        </span>
                    @endif
                </div>
            </div>

            <div class="adm-card-body p-4">
                <div class="row g-4">
                    {{-- Image --}}
                    <div class="col-md-5">
                        <div style="border-radius:12px;overflow:hidden;border:1px solid #e2e8f0;background:#f8fafc;box-shadow:0 4px 12px rgba(0,0,0,0.06);position:relative;">
                            @if($property->image)
                                <img
                                    src="{{ asset('storage/' . $property->image) }}"
                                    alt="{{ $property->title }}"
                                    style="width:100%;height:300px;object-fit:cover;display:block;">
                            @else
                                <div class="d-flex flex-column align-items-center justify-content-center" style="height:300px;color:#94a3b8;">
                                    <i class="fa-solid fa-image" style="font-size:52px;opacity:.3;margin-bottom:12px;"></i>
                                    <span>Aucune photo</span>
                                </div>
                            @endif

                            {{-- Prix en bandeau sur l'image --}}
                            <div style="position:absolute;bottom:12px;left:12px;right:12px;background:rgba(13,27,42,0.85);backdrop-filter:blur(6px);color:#fff;padding:10px 14px;border-radius:8px;display:flex;align-items:center;justify-content:between;">
                                <span class="small text-muted" style="color:#cbd5e1 !important;">Prix fixé</span>
                                <strong style="font-size:17px;color:#F97316;">
                                    {{ number_format($property->price, 0, ',', ' ') }} FCFA
                                    @if($property->status === 'a_louer')
                                        <span style="font-size:12px;font-weight:normal;color:#e2e8f0;">/ mois</span>
                                    @endif
                                </strong>
                            </div>
                        </div>
                    </div>

                    {{-- Spécifications techniques --}}
                    <div class="col-md-7">
                        <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:22px;">
                            <h6 class="text-uppercase fw-bold text-muted small mb-3">
                                <i class="fa-solid fa-list-check me-2 text-primary"></i> Spécifications du bien
                            </h6>

                            <div class="row g-3 mb-3">
                                <div class="col-6 col-sm-4">
                                    <div class="p-2 border rounded bg-white text-center">
                                        <div class="text-muted small"><i class="fa-solid fa-vector-square text-primary me-1"></i> Surface</div>
                                        <strong class="fs-6" style="color:#0d1b2a;">{{ $property->surface ? $property->surface . ' m²' : '-' }}</strong>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="p-2 border rounded bg-white text-center">
                                        <div class="text-muted small"><i class="fa-solid fa-bed text-warning me-1"></i> Chambres</div>
                                        <strong class="fs-6" style="color:#0d1b2a;">{{ $property->bedrooms ?: '-' }}</strong>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="p-2 border rounded bg-white text-center">
                                        <div class="text-muted small"><i class="fa-solid fa-bath text-info me-1"></i> Salles de bain</div>
                                        <strong class="fs-6" style="color:#0d1b2a;">{{ $property->bathrooms ?: '-' }}</strong>
                                    </div>
                                </div>
                            </div>

                            <table class="w-100" style="font-size:14px;">
                                <tr>
                                    <td class="text-muted py-2" style="width:130px;">Catégorie :</td>
                                    <td class="fw-bold py-2" style="color:#0d1b2a;">{{ $property->category?->name ?? 'Non définie' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Type :</td>
                                    <td class="py-2 fw-semibold text-dark">{{ $property->type ?: 'Non renseigné' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Ville :</td>
                                    <td class="py-2 text-dark">{{ $property->city }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Adresse :</td>
                                    <td class="py-2 text-dark">{{ $property->address ?: 'Non précisée' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Identifiant :</td>
                                    <td class="py-2"><code>#{{ $property->id }}</code></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Description complète --}}
                <div class="mt-4 pt-3 border-top">
                    <span class="text-uppercase small fw-bold text-muted d-block mb-2">Description du bien</span>
                    <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;line-height:1.7;color:#334155;font-size:15px;white-space:pre-wrap;">{{ $property->description ?: 'Aucune description détaillée renseignée.' }}</div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection