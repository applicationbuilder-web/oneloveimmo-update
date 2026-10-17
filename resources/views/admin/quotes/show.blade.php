@extends('layouts.admin')

@section('title', 'Demande de devis — ' . $quote->fullname)
@section('page-title', 'Demande de devis #' . $quote->id)
@section('page-subtitle', 'Soumise par ' . $quote->fullname . ' le ' . $quote->created_at->format('d/m/Y à H:i'))

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9">

        {{-- Actions supérieures --}}
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-4 gap-3">
            <a href="{{ route('admin.quotes.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux devis
            </a>

            <div class="d-flex align-items-center flex-wrap gap-2">
                {{-- Formulaire changement de statut --}}
                <form action="{{ route('admin.quotes.status', $quote) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="adm-btn adm-btn-primary" title="Passer au statut suivant">
                        <i class="fa-solid fa-rotate"></i>
                        Statut :
                        @if($quote->status === 'nouveau')
                            Nouveau &rarr; En cours
                        @elseif($quote->status === 'en_cours')
                            En cours &rarr; Traité
                        @else
                            Traité &rarr; Nouveau
                        @endif
                    </button>
                </form>

                @php
                    $qPhone = preg_replace('/[^0-9]/', '', (string)$quote->phone);
                    if (!empty($qPhone)) {
                        if (str_starts_with($qPhone, '0') && strlen($qPhone) === 9) {
                            $qPhone = '242' . substr($qPhone, 1);
                        } elseif (!str_starts_with($qPhone, '242') && strlen($qPhone) <= 9) {
                            $qPhone = '242' . $qPhone;
                        }
                    }
                @endphp

                @if($quote->phone && !empty($qPhone))
                    <a href="https://wa.me/{{ $qPhone }}?text={{ urlencode('Bonjour ' . $quote->fullname . ', suite à votre demande de devis pour le projet « ' . ($quote->project_type ?: 'immobilier') . ' » sur OneLove Immo...') }}" target="_blank" class="adm-btn text-white" style="background:#25D366;" title="Contacter sur WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                        WhatsApp
                    </a>
                @endif

                @if($quote->email)
                    <a href="mailto:{{ $quote->email }}?subject=Votre demande de devis sur OneLove Immo" class="adm-btn adm-btn-outline" title="Envoyer un email">
                        <i class="fa-solid fa-envelope"></i>
                        Email
                    </a>
                @endif

                @if($quote->phone)
                    <a href="tel:{{ $quote->phone }}" class="adm-btn adm-btn-success" title="Appeler">
                        <i class="fa-solid fa-phone"></i>
                        Appeler
                    </a>
                @endif

                <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression de cette demande de devis ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="adm-btn adm-btn-danger" title="Supprimer">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- Carte principale --}}
        <div class="adm-card mb-4">
            {{-- En-tête statut --}}
            <div class="adm-card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div style="width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,#F97316,#ea580c);color:#fff;display:flex;align-items:center;justify-content:center;font-size:20px;">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:#0d1b2a;">Demande de devis</h5>
                        <span class="text-muted small">Projet : <strong class="text-dark">{{ $quote->project_type ?? 'Non spécifié' }}</strong></span>
                    </div>
                </div>

                <div>
                    @if($quote->status === 'nouveau')
                        <span class="adm-badge adm-badge-warning" style="font-size:12px;padding:6px 14px;">
                            <i class="fa-solid fa-clock"></i> Nouveau
                        </span>
                    @elseif($quote->status === 'en_cours')
                        <span class="adm-badge adm-badge-info" style="font-size:12px;padding:6px 14px;">
                            <i class="fa-solid fa-spinner fa-spin"></i> En cours de traitement
                        </span>
                    @else
                        <span class="adm-badge adm-badge-success" style="font-size:12px;padding:6px 14px;">
                            <i class="fa-solid fa-circle-check"></i> Traité
                        </span>
                    @endif
                </div>
            </div>

            <div class="adm-card-body p-4">
                {{-- Informations client & projet en grille --}}
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;height:100%;">
                            <h6 class="text-uppercase fw-bold text-muted small mb-3">
                                <i class="fa-solid fa-user me-2 text-primary"></i> Coordonnées du client
                            </h6>
                            <table class="w-100" style="font-size:14px;">
                                <tr>
                                    <td class="text-muted py-1" style="width:110px;">Nom complet :</td>
                                    <td class="fw-bold py-1" style="color:#0d1b2a;">{{ $quote->fullname }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Téléphone :</td>
                                    <td class="py-1">
                                        <a href="tel:{{ $quote->phone }}" class="text-decoration-none fw-semibold" style="color:#10b981;">
                                            <i class="fa-solid fa-phone me-1"></i> {{ $quote->phone }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Email :</td>
                                    <td class="py-1">
                                        @if($quote->email)
                                            <a href="mailto:{{ $quote->email }}" class="text-decoration-none" style="color:#0F4C81;">
                                                <i class="fa-solid fa-envelope me-1"></i> {{ $quote->email }}
                                            </a>
                                        @else
                                            <span class="text-muted">Non renseigné</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Ville :</td>
                                    <td class="py-1 fw-semibold text-dark">
                                        <i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $quote->city ?? '-' }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;height:100%;">
                            <h6 class="text-uppercase fw-bold text-muted small mb-3">
                                <i class="fa-solid fa-briefcase me-2 text-warning"></i> Détails du projet
                            </h6>
                            <table class="w-100" style="font-size:14px;">
                                <tr>
                                    <td class="text-muted py-1" style="width:110px;">Type de projet :</td>
                                    <td class="fw-bold py-1" style="color:#0d1b2a;">{{ $quote->project_type ?? 'Général' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Budget estimé :</td>
                                    <td class="py-1">
                                        @if($quote->budget)
                                            <span class="fw-bold" style="color:#F97316;font-size:16px;">
                                                {{ number_format($quote->budget, 0, ',', ' ') }} FCFA
                                            </span>
                                        @else
                                            <span class="text-muted">Non spécifié</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Date d'envoi :</td>
                                    <td class="py-1 text-dark">
                                        {{ $quote->created_at->format('d/m/Y à H:i') }}
                                        <span class="text-muted small">({{ $quote->created_at->diffForHumans() }})</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Statut actuel :</td>
                                    <td class="py-1">
                                        <span class="fw-semibold text-capitalize">{{ str_replace('_', ' ', $quote->status) }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Message du client --}}
                <div class="mb-4">
                    <span class="text-uppercase small fw-bold text-muted d-block mb-2">Description / Cahier des charges</span>
                    <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;line-height:1.7;color:#334155;font-size:15px;white-space:pre-wrap;">{{ $quote->message ?: 'Aucun message supplémentaire fourni.' }}</div>
                </div>

                {{-- Pièce jointe si présente --}}
                <div>
                    <span class="text-uppercase small fw-bold text-muted d-block mb-2">Pièce jointe / Plan</span>
                    @if($quote->attachment)
                        <div class="d-flex align-items-center justify-content-between p-3" style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:10px;">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-file-lines text-primary" style="font-size:24px;"></i>
                                <div>
                                    <strong class="d-block text-dark">Document joint au devis</strong>
                                    <span class="text-muted small">{{ basename($quote->attachment) }}</span>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $quote->attachment) }}" target="_blank" class="adm-btn adm-btn-primary">
                                <i class="fa-solid fa-download"></i> Télécharger
                            </a>
                        </div>
                    @else
                        <div class="p-3 text-muted" style="background:#f8fafc;border:1px dashed #cbd5e1;border-radius:10px;font-size:14px;">
                            <i class="fa-regular fa-folder-open me-2"></i> Aucune pièce jointe transmise pour ce devis.
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>

@endsection