@extends('layouts.app')

@section('title', $property->title . ' — OneLove Immo')

@section('content')

@php
    $propImg = $property->image 
        ? asset('storage/' . $property->image)
        : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';

    $waMessage = "Bonjour OneLove Immo, je suis intéressé par l'annonce : \"" . $property->title . "\" (Prix : " . number_format($property->price, 0, ',', ' ') . " FCFA, Réf #" . $property->id . "). Pourrions-nous organiser une visite ou échanger à ce sujet ?";
    
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl($waMessage) 
        ?? 'https://wa.me/242060000000?text=' . urlencode($waMessage);
@endphp

{{-- =========================================================
     1. BREADCRUMB & EN-TÊTE DU BIEN
========================================================== --}}
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 13px;">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('properties.index') }}" class="text-decoration-none text-muted">Nos biens</a></li>
                <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ Str::limit($property->title, 45) }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5" style="background: #ffffff;">
    <div class="container">

        {{-- Titre et badges --}}
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                    @if($property->status == 'a_vendre')
                        <span class="badge bg-success px-3 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-tag me-1"></i> À vendre
                        </span>
                    @else
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-key me-1"></i> À louer
                        </span>
                    @endif

                    @if($property->featured)
                        <span class="badge bg-primary px-3 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-star me-1"></i> Coup de cœur
                        </span>
                    @endif

                    <span class="badge bg-secondary-subtle text-dark px-3 py-2 rounded-pill fw-semibold border">
                        <i class="fa-solid {{ $property->category?->icon ?: 'fa-layer-group' }} me-1 text-primary"></i>
                        {{ $property->category?->name ?? 'Immobilier' }}
                    </span>

                    <span class="text-muted small">Réf. #{{ $property->id }}</span>
                </div>

                <h1 class="fw-bold display-6 mb-2" style="color: #0d1b2a;">
                    {{ $property->title }}
                </h1>

                <p class="text-muted mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-location-dot text-danger"></i>
                    <span class="fw-semibold text-dark">{{ $property->city }}</span>
                    @if($property->address)
                        <span>— {{ $property->address }}</span>
                    @endif
                </p>
            </div>

            {{-- Prix en grand format --}}
            <div class="text-lg-end">
                <span class="text-muted small text-uppercase fw-bold d-block">Prix proposé</span>
                <h2 class="display-6 fw-bold mb-0" style="color: #F97316;">
                    {{ number_format($property->price, 0, ',', ' ') }}
                    <small class="fs-5 text-muted fw-normal" style="font-size: 16px !important;">FCFA</small>
                </h2>
                @if($property->status == 'a_louer')
                    <span class="badge bg-light text-muted border">Charges et modalités à convenir</span>
                @endif
            </div>
        </div>

        <div class="row g-5">

            <!-- Colonne Principale (Gauche) -->
            <div class="col-lg-8">

                {{-- Photo principale grand format --}}
                <div class="position-relative rounded-4 overflow-hidden shadow-sm mb-4" style="background:#0d1b2a;">
                    <img
                        src="{{ $propImg }}"
                        class="img-fluid w-100"
                        style="max-height: 520px; object-fit: cover; display: block;"
                        alt="{{ $property->title }}">
                </div>

                {{-- Spécifications techniques (grille d'icônes) --}}
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background:#f8fafc; border: 1px solid #e2e8f0 !important;">
                    <h5 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-list-check me-2 text-primary"></i> Caractéristiques principales
                    </h5>

                    <div class="row g-3 text-center">
                        <div class="col-6 col-sm-3">
                            <div class="p-3 bg-white rounded-3 shadow-sm border h-100">
                                <div class="text-muted small mb-1"><i class="fa-solid fa-vector-square text-primary me-1"></i> Surface</div>
                                <strong class="fs-5" style="color: #0d1b2a;">{{ $property->surface ? $property->surface . ' m²' : 'N/C' }}</strong>
                            </div>
                        </div>

                        <div class="col-6 col-sm-3">
                            <div class="p-3 bg-white rounded-3 shadow-sm border h-100">
                                <div class="text-muted small mb-1"><i class="fa-solid fa-bed text-warning me-1"></i> Chambres</div>
                                <strong class="fs-5" style="color: #0d1b2a;">{{ $property->bedrooms ?: 'N/C' }}</strong>
                            </div>
                        </div>

                        <div class="col-6 col-sm-3">
                            <div class="p-3 bg-white rounded-3 shadow-sm border h-100">
                                <div class="text-muted small mb-1"><i class="fa-solid fa-bath text-info me-1"></i> Salles de bain</div>
                                <strong class="fs-5" style="color: #0d1b2a;">{{ $property->bathrooms ?: 'N/C' }}</strong>
                            </div>
                        </div>

                        <div class="col-6 col-sm-3">
                            <div class="p-3 bg-white rounded-3 shadow-sm border h-100">
                                <div class="text-muted small mb-1"><i class="fa-solid fa-building me-1 text-success"></i> Type</div>
                                <strong class="fs-6 d-block text-truncate" style="color: #0d1b2a;">{{ $property->type ?: 'Maison' }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description complète --}}
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-align-left me-2 text-primary"></i> Description du bien
                    </h5>

                    <div style="line-height: 1.8; color: #475569; font-size: 15px; white-space: pre-wrap;">
                        {{ $property->description ?: 'Aucune description détaillée renseignée pour le moment. Contactez notre équipe pour poser vos questions et organiser une visite sur place.' }}
                    </div>

                    {{-- Garanties OneLove Immo --}}
                    <div class="mt-4 pt-3 border-top">
                        <div class="row g-3">
                            <div class="col-md-6 d-flex align-items-center gap-2 text-muted small">
                                <i class="fa-solid fa-shield-halved text-success fs-5"></i>
                                <span>Situation juridique et foncière vérifiée</span>
                            </div>
                            <div class="col-md-6 d-flex align-items-center gap-2 text-muted small">
                                <i class="fa-solid fa-handshake text-primary fs-5"></i>
                                <span>Accompagnement notarié jusqu'à la signature</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Colonne Latérale (Droite) : Contact & Prise de RDV -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 90px; z-index: 10;">

                    {{-- CARTE WHATSAPP DIRECTE POUR CE BIEN --}}
                    <div class="card border-0 shadow-sm mb-4 text-white rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #075E54 0%, #128C7E 100%);">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div style="width: 48px; height: 48px; border-radius: 50%; background: #25D366; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #fff; box-shadow: 0 4px 12px rgba(37,211,102,0.4);">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-white">Intéressé par ce bien ?</h5>
                                    <span class="small text-white-50">Réponse instantanée d'un agent</span>
                                </div>
                            </div>

                            <p class="small text-white-50 mb-3" style="line-height: 1.5;">
                                Discutez immédiatement avec notre conseiller pour obtenir la localisation précise, les photos complémentaires ou planifier une visite.
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

                    {{-- Formulaire de demande d'informations rapide --}}
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold text-dark mb-1">
                            Demander une visite
                        </h5>
                        <p class="text-muted small mb-3">
                            Laissez vos coordonnées pour être recontacté sous 24h.
                        </p>

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="Intérêt pour le bien réf. #{{ $property->id }} — {{ $property->title }}">

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Votre nom complet <span class="text-danger">*</span></label>
                                <input type="text" name="name" required class="form-control" placeholder="Ex: Paul Milandou" style="border-radius: 8px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Téléphone <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" required class="form-control" placeholder="+242 06 123 45 67" style="border-radius: 8px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="paul@gmail.com" style="border-radius: 8px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Votre message</label>
                                <textarea name="message" rows="3" class="form-control" style="border-radius: 8px;">Bonjour, je souhaite obtenir plus d'informations et organiser une visite pour le bien « {{ $property->title }} ».</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm" style="border-radius: 8px;">
                                <i class="fa-solid fa-paper-plane me-2"></i> Envoyer ma demande
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

{{-- =========================================================
     3. BIENS SIMILAIRES
========================================================== --}}
@if(isset($similarProperties) && $similarProperties->count() > 0)
    <section class="py-5 bg-light border-top">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill mb-1">Suggestions</span>
                    <h3 class="fw-bold mb-0" style="color: #0d1b2a;">Biens similaires à découvrir</h3>
                </div>
                <a href="{{ route('properties.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-2 fw-semibold">
                    Voir tout le catalogue <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @foreach($similarProperties as $similar)
                    <div class="col-md-4">
                        <x-property-card :property="$similar" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@endsection