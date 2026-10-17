@extends('layouts.admin')

@section('title', 'Projet : ' . $construction->title)
@section('page-title', 'Détails du chantier')
@section('page-subtitle', 'Projet de construction « ' . $construction->title . ' »')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9">

        {{-- Barre supérieure d'action --}}
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-4 gap-3">
            <a href="{{ route('admin.constructions.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux chantiers
            </a>

            <div class="d-flex align-items-center flex-wrap gap-2">
                <a href="{{ route('admin.constructions.edit', $construction) }}" class="adm-btn adm-btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Modifier le projet
                </a>

                <form action="{{ route('admin.constructions.destroy', $construction) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression de ce projet de construction ?');">
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
            <div class="adm-card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="d-flex align-items-center gap-3">
                    <div style="width:44px;height:44px;border-radius:10px;background:#fef3c7;color:#d97706;display:flex;align-items:center;justify-content:center;font-size:20px;">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:#0d1b2a;">{{ $construction->title }}</h5>
                        <span class="text-muted small">Créé le {{ $construction->created_at->format('d/m/Y à H:i') }}</span>
                    </div>
                </div>

                <div>
                    @if($construction->status === 'termine')
                        <span class="adm-badge adm-badge-success" style="font-size:12px;padding:6px 14px;">
                            <i class="fa-solid fa-circle-check"></i> Terminé
                        </span>
                    @elseif($construction->status === 'en_cours')
                        <span class="adm-badge adm-badge-info" style="font-size:12px;padding:6px 14px;">
                            <i class="fa-solid fa-spinner fa-spin"></i> En cours
                        </span>
                    @else
                        <span class="adm-badge adm-badge-warning" style="font-size:12px;padding:6px 14px;">
                            <i class="fa-solid fa-calendar-clock"></i> À venir
                        </span>
                    @endif
                </div>
            </div>

            <div class="adm-card-body p-4">
                <div class="row g-4">
                    {{-- Image du projet --}}
                    <div class="col-md-5">
                        <div style="border-radius:12px;overflow:hidden;border:1px solid #e2e8f0;background:#f8fafc;box-shadow:0 4px 12px rgba(0,0,0,0.06);">
                            @if($construction->image)
                                <img
                                    src="{{ asset('storage/' . $construction->image) }}"
                                    alt="{{ $construction->title }}"
                                    style="width:100%;height:280px;object-fit:cover;display:block;">
                            @else
                                <div class="d-flex flex-column align-items-center justify-content-center" style="height:280px;color:#94a3b8;">
                                    <i class="fa-solid fa-image" style="font-size:48px;opacity:.3;margin-bottom:10px;"></i>
                                    <span>Aucune image téléversée</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Détails --}}
                    <div class="col-md-7">
                        <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;">
                            <h6 class="text-uppercase fw-bold text-muted small mb-3">
                                <i class="fa-solid fa-circle-info me-2 text-primary"></i> Spécifications du projet
                            </h6>

                            <table class="w-100" style="font-size:14px;">
                                <tr>
                                    <td class="text-muted py-2" style="width:140px;">Nom du projet :</td>
                                    <td class="fw-bold py-2" style="color:#0d1b2a;">{{ $construction->title }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Type :</td>
                                    <td class="py-2 fw-semibold text-dark">{{ $construction->type ?? 'Non spécifié' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Localisation :</td>
                                    <td class="py-2">
                                        <span class="fw-semibold" style="color:#0F4C81;">
                                            <i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $construction->location ?: 'Non précisée' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Statut :</td>
                                    <td class="py-2">
                                        <span class="text-capitalize fw-bold">{{ str_replace('_', ' ', $construction->status) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Slug :</td>
                                    <td class="py-2">
                                        <code>{{ $construction->slug ?? '-' }}</code>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="mt-4 pt-3 border-top">
                    <span class="text-uppercase small fw-bold text-muted d-block mb-2">Description du chantier</span>
                    <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;line-height:1.7;color:#334155;font-size:15px;white-space:pre-wrap;">{{ $construction->description ?: 'Aucune description disponible.' }}</div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection