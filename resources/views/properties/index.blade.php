@extends('layouts.app')

@section('title', 'Nos Biens Immobiliers — OneLove Immo')

@section('content')

@php
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl("Bonjour OneLove Immo, je recherche un bien immobilier au Congo.") 
        ?? 'https://wa.me/242060000000?text=' . urlencode("Bonjour OneLove Immo, je recherche un bien immobilier.");
@endphp

{{-- =========================================================
     1. HERO HEADER DE LA PAGE BIENS
========================================================== --}}
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 60%, #0F4C81 100%); color: #ffffff;">
    <div style="position:absolute; top:-100px; right:-100px; width:450px; height:450px; background:radial-gradient(circle, rgba(20,120,255,0.2) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-120px; left:-120px; width:450px; height:450px; background:radial-gradient(circle, rgba(249,115,22,0.18) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>

    <div class="container py-4 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <nav aria-label="breadcrumb" class="mb-3 d-inline-block">
                    <ol class="breadcrumb justify-content-center px-3 py-1 rounded-pill" style="background: rgba(255,255,255,0.08); font-size: 13px;">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Catalogue immobilier</li>
                    </ol>
                </nav>

                <span class="badge px-3 py-2 text-uppercase mb-3 d-inline-block shadow-sm" style="background: rgba(249, 115, 22, 0.2); color: #F97316; border: 1px solid rgba(249, 115, 22, 0.4); font-weight: 700; letter-spacing: 1px;">
                    <i class="fa-solid fa-house-chimney me-1"></i> Catalogue Exclusif
                </span>

                <h1 class="display-4 fw-bold mb-3" style="letter-spacing: -0.5px;">
                    Nos Biens Immobiliers de <span style="background: linear-gradient(135deg, #F97316, #ffbf00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Prestige</span>
                </h1>

                <p class="lead text-white-50 mb-4" style="line-height: 1.8; font-size: 18px;">
                    Découvrez notre sélection rigoureuse de villas, appartements sécurisés et terrains titrés disponibles à Brazzaville, Pointe-Noire et dans tout le Congo.
                </p>

                {{-- Onglets rapides de statut --}}
                <div class="d-inline-flex p-1 rounded-pill shadow-sm" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(8px);">
                    <a href="{{ route('properties.index') }}" class="btn btn-sm rounded-pill px-4 py-2 fw-semibold {{ !request('status') ? 'btn-warning text-dark' : 'text-white' }}">
                        Tous les biens
                    </a>
                    <a href="{{ route('properties.index', array_merge(request()->query(), ['status' => 'a_vendre'])) }}" class="btn btn-sm rounded-pill px-4 py-2 fw-semibold {{ request('status') == 'a_vendre' ? 'btn-warning text-dark' : 'text-white' }}">
                        À vendre
                    </a>
                    <a href="{{ route('properties.index', array_merge(request()->query(), ['status' => 'a_louer'])) }}" class="btn btn-sm rounded-pill px-4 py-2 fw-semibold {{ request('status') == 'a_louer' ? 'btn-warning text-dark' : 'text-white' }}">
                        À louer
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
     2. BARRE DE FILTRE ET RECHERCHE AVANCÉE
========================================================== --}}
<div class="container position-relative" style="margin-top: -35px; z-index: 20;">
    <div class="card border-0 shadow-lg rounded-4 p-4" style="background: #ffffff;">
        <form method="GET" action="{{ route('properties.index') }}">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif

            <div class="row g-3 align-items-center">
                {{-- Recherche par mot-clé --}}
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted text-uppercase mb-1">Mot-clé / Quartier</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0 bg-light" placeholder="Ex: Villa, Mpila, Bacongo..." style="border-radius: 0 10px 10px 0;">
                    </div>
                </div>

                {{-- Catégorie --}}
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted text-uppercase mb-1">Catégorie</label>
                    <select name="category_id" class="form-select bg-light" style="border-radius: 10px;">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Ville --}}
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted text-uppercase mb-1">Ville</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-location-dot text-danger"></i></span>
                        <input type="text" name="city" value="{{ request('city') }}" class="form-control border-start-0 bg-light" placeholder="Brazzaville, Pointe-Noire..." style="border-radius: 0 10px 10px 0;">
                    </div>
                </div>

                {{-- Boutons --}}
                <div class="col-md-2 d-flex gap-2 align-items-end pt-md-4">
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm" style="border-radius: 10px;">
                        <i class="fa-solid fa-filter me-1"></i> Filtrer
                    </button>
                    @if(request()->hasAny(['search', 'category_id', 'city', 'status']))
                        <a href="{{ route('properties.index') }}" class="btn btn-outline-secondary py-2" title="Réinitialiser les filtres" style="border-radius: 10px;">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>


{{-- =========================================================
     3. GRILLE DES BIENS IMMOBILIERS
========================================================== --}}
<section class="py-5" style="background: #f8fafc;">
    <div class="container py-4">

        {{-- Ligne d'en-tête de résultats --}}
        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
            <div>
                <h3 class="fw-bold mb-0" style="color: #0d1b2a;">
                    @if(request('status') == 'a_vendre')
                        Biens à vendre
                    @elseif(request('status') == 'a_louer')
                        Biens à louer
                    @else
                        Tous nos biens immobiliers
                    @endif
                </h3>
                <span class="text-muted small">
                    <strong>{{ $properties->total() }}</strong> annonce(s) trouvée(s)
                </span>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm text-white fw-semibold d-inline-flex align-items-center gap-2" style="background:#25D366; border-radius: 8px;">
                    <i class="fa-brands fa-whatsapp fs-6"></i>
                    <span>Demande spécifique sur WhatsApp</span>
                </a>
            </div>
        </div>

        {{-- Grille des biens --}}
        <div class="row g-4">
            @forelse ($properties as $property)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative property-card-item" style="transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1); background: #ffffff;">

                        {{-- Wrapper Image avec Badges --}}
                        <div class="position-relative overflow-hidden" style="height: 240px;">
                            @php
                                $propImg = $property->image 
                                    ? asset('storage/' . $property->image)
                                    : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80';
                            @endphp

                            <img
                                src="{{ $propImg }}"
                                class="w-100 h-100"
                                style="object-fit: cover; transition: transform 0.6s ease;"
                                alt="{{ $property->title }}"
                                loading="lazy">

                            {{-- Badges flottants sur l'image --}}
                            <div class="position-absolute top-0 start-0 m-3 d-flex flex-column gap-1">
                                @if($property->status == 'a_vendre')
                                    <span class="badge bg-success px-3 py-2 rounded-pill shadow-sm fw-semibold">
                                        <i class="fa-solid fa-tag me-1"></i> À vendre
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm fw-semibold">
                                        <i class="fa-solid fa-key me-1"></i> À louer
                                    </span>
                                @endif

                                @if($property->featured)
                                    <span class="badge bg-primary px-3 py-2 rounded-pill shadow-sm fw-semibold">
                                        <i class="fa-solid fa-star me-1"></i> Vedette
                                    </span>
                                @endif
                            </div>

                            {{-- Catégorie en bas à gauche --}}
                            <div class="position-absolute bottom-0 start-0 m-3">
                                <span class="badge bg-dark bg-opacity-75 text-white px-3 py-2 rounded-pill shadow-sm" style="backdrop-filter: blur(6px); font-size: 11px;">
                                    <i class="fa-solid {{ $property->category?->icon ?: 'fa-layer-group' }} me-1"></i>
                                    {{ $property->category?->name ?? 'Immobilier' }}
                                </span>
                            </div>

                            {{-- Ville en bas à droite --}}
                            <div class="position-absolute bottom-0 end-0 m-3">
                                <span class="badge bg-white text-dark px-3 py-2 rounded-pill shadow-sm fw-semibold" style="font-size: 11px;">
                                    <i class="fa-solid fa-location-dot text-danger me-1"></i>
                                    {{ $property->city }}
                                </span>
                            </div>
                        </div>

                        {{-- Corps de la Carte --}}
                        <div class="card-body p-4 d-flex flex-column">

                            @if($property->address)
                                <p class="text-muted small mb-1 text-truncate">
                                    <i class="fa-regular fa-compass me-1"></i> {{ $property->address }}
                                </p>
                            @endif

                            <h5 class="fw-bold mb-2 text-dark" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 48px; line-height: 1.3;" title="{{ $property->title }}">
                                <a href="{{ route('properties.show', $property) }}" class="text-dark text-decoration-none hover-primary">
                                    {{ $property->title }}
                                </a>
                            </h5>

                            {{-- Spécifications techniques (icônes) --}}
                            <div class="d-flex align-items-center justify-content-between py-2 my-2 border-top border-bottom" style="font-size: 13px; color: #64748b;">
                                <span>
                                    <i class="fa-solid fa-vector-square text-primary me-1"></i>
                                    {{ $property->surface ? $property->surface . ' m²' : '-' }}
                                </span>
                                <span>
                                    <i class="fa-solid fa-bed text-warning me-1"></i>
                                    {{ $property->bedrooms ? $property->bedrooms . ' ch.' : '-' }}
                                </span>
                                <span>
                                    <i class="fa-solid fa-bath text-info me-1"></i>
                                    {{ $property->bathrooms ? $property->bathrooms . ' sdb' : '-' }}
                                </span>
                            </div>

                            {{-- Prix & Bouton --}}
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-2">
                                <div>
                                    <span class="text-muted small d-block" style="font-size: 11px;">Prix</span>
                                    <h4 class="fw-bold mb-0" style="color: #F97316;">
                                        {{ number_format($property->price, 0, ',', ' ') }}
                                        <small class="fs-6 text-muted" style="font-size: 12px !important;">FCFA</small>
                                    </h4>
                                </div>

                                <a href="{{ route('properties.show', $property) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-2 fw-semibold d-inline-flex align-items-center gap-1">
                                    <span>Détails</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 text-center py-5 px-4 bg-white">
                        <div class="mb-3">
                            <span class="d-inline-flex align-items-center justify-content-center bg-light text-warning rounded-circle" style="width: 70px; height: 70px;">
                                <i class="fa-solid fa-house-circle-xmark fa-2x"></i>
                            </span>
                        </div>
                        <h4 class="fw-bold text-dark mb-2">Aucun bien ne correspond à vos critères</h4>
                        <p class="text-muted mb-4 mx-auto" style="max-width: 500px;">
                            Essayez de modifier vos filtres de recherche ou contactez notre équipe pour nous confier votre recherche personnalisée.
                        </p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="{{ route('properties.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold">
                                <i class="fa-solid fa-rotate-left me-1"></i> Réinitialiser les filtres
                            </a>
                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn text-white rounded-pill px-4 py-2 fw-semibold" style="background:#25D366;">
                                <i class="fa-brands fa-whatsapp me-1"></i> Demander sur WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($properties->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $properties->links() }}
            </div>
        @endif

    </div>
</section>


{{-- =========================================================
     4. BANNIÈRE PROPRIÉTAIRES / ESTIMATION
========================================================== --}}
<section class="py-5" style="background: #ffffff;">
    <div class="container">
        <div class="p-4 p-md-5 rounded-4 text-white position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #0d1b2a 0%, #0F4C81 100%); box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
            <div class="row align-items-center position-relative" style="z-index: 1;">
                <div class="col-lg-8">
                    <span class="badge px-3 py-2 text-uppercase mb-2" style="background: rgba(249, 115, 22, 0.25); color: #F97316; font-weight: 700;">
                        <i class="fa-solid fa-hand-holding-dollar me-1"></i> Vous êtes propriétaire ?
                    </span>
                    <h2 class="display-6 fw-bold mb-2">Confiez-Nous La Vente Ou La Location De Votre Bien</h2>
                    <p class="text-white-50 mb-0" style="font-size: 16px; line-height: 1.6;">
                        Estimation au juste prix du marché, diffusion auprès d'un réseau d'acquéreurs qualifiés et sécurisation juridique complète de la transaction.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="{{ route('contact') }}" class="btn btn-warning fw-bold px-4 py-3 shadow" style="border-radius: 10px;">
                        <i class="fa-solid fa-paper-plane me-2"></i> Faire estimer mon bien
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .property-card-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.12) !important;
    }
    .property-card-item:hover img {
        transform: scale(1.06);
    }
    .hover-primary:hover {
        color: #0F4C81 !important;
    }
</style>

@endsection