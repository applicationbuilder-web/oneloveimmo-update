@extends('layouts.app')

@section('title', $construction->title . ' — Projet de Construction OneLove Immo')

@section('content')

@php
    $cImg = $construction->image
        ? asset('storage/' . $construction->image)
        : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80';

    $waMessage = "Bonjour OneLove Immo, je viens de consulter votre projet de construction « " . $construction->title . " » (" . ($construction->location ?: 'Congo') . "). J'aimerais échanger avec vous pour réaliser un projet similaire.";
    
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl($waMessage) 
        ?? 'https://wa.me/242060000000?text=' . urlencode($waMessage);
@endphp

{{-- =========================================================
     1. BREADCRUMB NAVIGATION
========================================================== --}}
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 13px;">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('construction.index') }}" class="text-decoration-none text-muted">Constructions</a></li>
                <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ Str::limit($construction->title, 45) }}</li>
            </ol>
        </nav>
    </div>
</section>

{{-- =========================================================
     2. DÉTAIL DU PROJET
========================================================== --}}
<section class="py-5" style="background:#ffffff;">
    <div class="container">

        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                    @if(in_array(strtolower($construction->status), ['termine', 'terminé', 'livre', 'livré']))
                        <span class="badge bg-success px-3 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-circle-check me-1"></i> Projet Terminé & Livré
                        </span>
                    @elseif(in_array(strtolower($construction->status), ['en_cours', 'en cours']))
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-spinner fa-spin me-1"></i> Chantier En Cours
                        </span>
                    @else
                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-clock me-1"></i> Projet À Venir
                        </span>
                    @endif

                    @if($construction->type)
                        <span class="badge bg-light text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-tag me-1"></i> {{ $construction->type }}
                        </span>
                    @endif
                </div>

                <h1 class="fw-bold display-6 mb-2" style="color:#0d1b2a;">
                    {{ $construction->title }}
                </h1>

                @if($construction->location)
                    <p class="text-muted mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-location-dot text-danger"></i>
                        <span class="fw-semibold text-dark">{{ $construction->location }}</span>
                    </p>
                @endif
            </div>

            <div class="text-lg-end">
                <a href="{{ route('quotes.create') }}" class="btn btn-warning fw-bold px-4 py-2 shadow-sm" style="border-radius: 10px;">
                    <i class="fa-solid fa-file-signature me-1"></i> Devis pour projet similaire
                </a>
            </div>
        </div>

        <div class="row g-5">

            <!-- Colonne Principale (Gauche) -->
            <div class="col-lg-8">

                {{-- Photo principale grand format --}}
                <div class="rounded-4 overflow-hidden shadow-sm mb-4" style="background:#0d1b2a;">
                    <img
                        src="{{ $cImg }}"
                        class="img-fluid w-100"
                        style="max-height: 520px; object-fit: cover; display: block;"
                        alt="{{ $construction->title }}">
                </div>

                {{-- Spécifications du projet --}}
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background:#f8fafc; border:1px solid #e2e8f0 !important;">
                    <h5 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-circle-info me-2 text-primary"></i> Fiche technique du chantier
                    </h5>

                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div class="p-3 bg-white rounded-3 border">
                                <span class="text-muted small d-block">Type d'ouvrage</span>
                                <strong class="text-dark">{{ $construction->type ?: 'Construction générale' }}</strong>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="p-3 bg-white rounded-3 border">
                                <span class="text-muted small d-block">Localisation</span>
                                <strong class="text-dark">{{ $construction->location ?: 'Congo' }}</strong>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="p-3 bg-white rounded-3 border">
                                <span class="text-muted small d-block">État d'avancement</span>
                                <strong class="text-dark text-capitalize">{{ str_replace('_', ' ', $construction->status) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description complète --}}
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-align-left me-2 text-primary"></i> Présentation des travaux
                    </h5>

                    <div style="line-height: 1.8; color: #475569; font-size: 15px; white-space: pre-wrap;">
                        {{ $construction->description ?: 'Ce chantier a été conçu et suivi avec l\'exigence technique propre à OneLove Immo. Nous mettons à profit des matériaux de haute qualité, un ferraillage dimensionné selon les normes et une coordination rigoureuse des corps d\'état.' }}
                    </div>

                    {{-- Garanties BTP --}}
                    <div class="mt-4 pt-3 border-top">
                        <div class="row g-3">
                            <div class="col-md-6 d-flex align-items-center gap-2 text-muted small">
                                <i class="fa-solid fa-certificate text-success fs-5"></i>
                                <span>Matériaux conformes et résistance garantie</span>
                            </div>
                            <div class="col-md-6 d-flex align-items-center gap-2 text-muted small">
                                <i class="fa-solid fa-clock-rotate-left text-primary fs-5"></i>
                                <span>Livraison dans le respect strict des délais</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Colonne Latérale (Droite) : Contact & Devis -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 90px; z-index: 10;">

                    {{-- CARTE WHATSAPP DIRECTE POUR CE PROJET --}}
                    <div class="card border-0 shadow-sm mb-4 text-white rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #075E54 0%, #128C7E 100%);">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div style="width: 48px; height: 48px; border-radius: 50%; background: #25D366; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #fff; box-shadow: 0 4px 12px rgba(37,211,102,0.4);">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-white">Un projet similaire ?</h5>
                                    <span class="small text-white-50">Échangez avec notre conducteur de travaux</span>
                                </div>
                            </div>

                            <p class="small text-white-50 mb-3" style="line-height: 1.5;">
                                Discutez de vos plans, demandez une estimation approximative ou planifiez une visite sur l'un de nos chantiers témoins.
                            </p>

                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-light w-100 fw-bold py-2 shadow-sm d-flex align-items-center justify-content-center gap-2" style="color: #075E54; border-radius: 10px;">
                                <i class="fa-brands fa-whatsapp fs-5" style="color: #25D366;"></i>
                                Écrire sur WhatsApp
                            </a>

                            @if($settings?->contact_phone)
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}" class="btn btn-outline-light w-100 fw-semibold py-2 mt-2 d-flex align-items-center justify-content-center gap-2" style="border-radius: 10px; font-size: 14px;">
                                    <i class="fa-solid fa-phone"></i>
                                    Appeler : {{ $settings->contact_phone }}
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Formulaire rapide de contact --}}
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold text-dark mb-1">
                            Demander un devis BTP
                        </h5>
                        <p class="text-muted small mb-3">
                            Recevez une étude personnalisée pour votre terrain.
                        </p>

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="Intérêt pour un projet similaire à : {{ $construction->title }}">

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Votre nom <span class="text-danger">*</span></label>
                                <input type="text" name="name" required class="form-control" placeholder="Jean Moukassa" style="border-radius: 8px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Téléphone <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" required class="form-control" placeholder="+242 06 123 45 67" style="border-radius: 8px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Type de projet</label>
                                <input type="text" class="form-control" value="Construction / Génie Civil" readonly style="border-radius: 8px; background: #f8fafc;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Votre message</label>
                                <textarea name="message" rows="3" class="form-control" style="border-radius: 8px;">Bonjour, j'ai découvert votre projet « {{ $construction->title }} » et j'aimerais recevoir une estimation pour mon propre projet de construction.</textarea>
                            </div>

                            <button type="submit" class="btn btn-warning w-100 fw-bold py-2 shadow-sm text-dark" style="border-radius: 8px;">
                                <i class="fa-solid fa-paper-plane me-2"></i> Transmettre ma demande
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

{{-- =========================================================
     3. AUTRES RÉALISATIONS
========================================================== --}}
@if(isset($otherProjects) && $otherProjects->count() > 0)
    <section class="py-5 bg-light border-top">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <span class="badge bg-warning-subtle text-dark fw-semibold px-3 py-1 rounded-pill mb-1">Nos Chantiers</span>
                    <h3 class="fw-bold mb-0" style="color: #0d1b2a;">Autres réalisations à découvrir</h3>
                </div>
                <a href="{{ route('construction.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-2 fw-semibold">
                    Voir tous les chantiers <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @foreach($otherProjects as $other)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden" style="background:#ffffff;">
                            <div style="height: 200px; overflow:hidden;">
                                <img
                                    src="{{ $other->image ? asset('storage/' . $other->image) : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80' }}"
                                    class="w-100 h-100"
                                    style="object-fit: cover;"
                                    alt="{{ $other->title }}">
                            </div>
                            <div class="p-3 d-flex flex-column">
                                <h6 class="fw-bold text-dark mb-1">{{ $other->title }}</h6>
                                <p class="text-muted small mb-3">{{ $other->location ?: 'Congo' }}</p>
                                <a href="{{ route('construction.show', $other) }}" class="btn btn-sm btn-outline-primary rounded-pill mt-auto">
                                    Découvrir le projet
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@endsection
