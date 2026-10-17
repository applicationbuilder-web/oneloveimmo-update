@extends('layouts.app')

@section('title', 'Construction, Rénovation & Architecture — OneLove Immo')

@section('content')

@php
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl("Bonjour OneLove Immo, j'ai un projet de construction ou de rénovation au Congo et je souhaite un devis.")
        ?? 'https://wa.me/242060000000?text=' . urlencode("Bonjour OneLove Immo, j'ai un projet de construction.");
    
    $constImg = ($settings && $settings->construction_image)
        ? asset('storage/' . $settings->construction_image)
        : 'https://images.unsplash.com/photo-1541888946425-d0fbb1861564?auto=format&fit=crop&w=1200&q=80';
@endphp

{{-- =========================================================
     1. HERO SECTION CONSTRUCTION & BTP
========================================================== --}}
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 60%, #0F4C81 100%); color: #ffffff;">
    <div style="position:absolute; top:-100px; right:-100px; width:450px; height:450px; background:radial-gradient(circle, rgba(249,115,22,0.2) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-120px; left:-120px; width:450px; height:450px; background:radial-gradient(circle, rgba(20,120,255,0.18) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>

    <div class="container py-4 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <nav aria-label="breadcrumb" class="mb-3 d-inline-block">
                    <ol class="breadcrumb justify-content-center px-3 py-1 rounded-pill" style="background: rgba(255,255,255,0.08); font-size: 13px;">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Construction & BTP</li>
                    </ol>
                </nav>

                <span class="badge px-3 py-2 text-uppercase mb-3 d-inline-block shadow-sm" style="background: rgba(249, 115, 22, 0.2); color: #F97316; border: 1px solid rgba(249, 115, 22, 0.4); font-weight: 700; letter-spacing: 1px;">
                    <i class="fa-solid fa-person-digging me-1"></i> Génie Civil, Architecture & Maçonnerie
                </span>

                <h1 class="display-4 fw-bold mb-3" style="letter-spacing: -0.5px;">
                    Construisons Vos Rêves Avec <span style="background: linear-gradient(135deg, #F97316, #ffbf00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Rigueur & Passion</span>
                </h1>

                <p class="lead text-white-50 mb-4" style="line-height: 1.8; font-size: 18px;">
                    De l'esquisse 3D à la remise solennelle des clés, OneLove Immo donne vie à vos projets de villas modernes, immeubles R+ et rénovations au Congo.
                </p>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('quotes.create') }}" class="btn btn-warning fw-bold px-4 py-3 shadow" style="border-radius: 10px;">
                        <i class="fa-solid fa-calculator me-2"></i> Estimer mon chantier
                    </a>
                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light fw-bold px-4 py-3" style="border-radius: 10px;">
                        <i class="fa-brands fa-whatsapp me-2 text-success"></i> Échanger avec un ingénieur
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
     2. NOS 3 GRANDS DOMAINES D'INTERVENTION
========================================================== --}}
<section class="py-5" style="background:#ffffff;">
    <div class="container py-lg-4">

        <div class="text-center mb-5">
            <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#eff6ff; color:#0F4C81; font-weight:700; letter-spacing:1px;">
                <i class="fa-solid fa-cubes me-1"></i> Nos Compétences Clés
            </span>
            <h2 class="fw-bold display-6" style="color: #0d1b2a;">
                Une Expertise Complète Du Bâtiment
            </h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Des équipes chevronnées et des équipements modernes pour concrétiser chaque phase de votre chantier.
            </p>
        </div>

        <div class="row g-4">

            {{-- 1. Construction Gros-Œuvre --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center" style="background: #f8fafc; border: 1px solid #e2e8f0 !important; transition: all .3s ease;">
                    <div class="mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 20px; background: #0F4C81; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 28px; box-shadow: 0 8px 20px rgba(15,76,129,0.25);">
                        <i class="fa-solid fa-trowel-bricks"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #0d1b2a;">Gros-Œuvre & Maçonnerie</h4>
                    <p class="text-muted small mb-3" style="line-height: 1.6;">
                        Fondations parasismiques, béton armé certifié, élévation de murs, dalles et toitures durables pour villas et immeubles.
                    </p>
                    <ul class="list-unstyled text-muted small text-start ps-3 mb-0">
                        <li class="mb-1"><i class="fa-solid fa-circle-check text-success me-2"></i>Étude géotechnique préalable</li>
                        <li class="mb-1"><i class="fa-solid fa-circle-check text-success me-2"></i>Contrôle permanent des fers & ciment</li>
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i>Respect strict du planning</li>
                    </ul>
                </div>
            </div>

            {{-- 2. Architecture & Modélisation 3D --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center" style="background: #f8fafc; border: 1px solid #e2e8f0 !important; transition: all .3s ease;">
                    <div class="mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 20px; background: #F97316; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 28px; box-shadow: 0 8px 20px rgba(249,115,22,0.25);">
                        <i class="fa-solid fa-compass-drafting"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #0d1b2a;">Architecture & Plans 3D</h4>
                    <p class="text-muted small mb-3" style="line-height: 1.6;">
                        Conception sur-mesure de vos plans architecturaux, modélisation 3D photoréaliste et constitution des dossiers de permis de construire.
                    </p>
                    <ul class="list-unstyled text-muted small text-start ps-3 mb-0">
                        <li class="mb-1"><i class="fa-solid fa-circle-check text-success me-2"></i>Rendus photoréalistes extérieurs/intérieurs</li>
                        <li class="mb-1"><i class="fa-solid fa-circle-check text-success me-2"></i>Plans côtés d'exécution complets</li>
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i>Optimisation de l'éclairage naturel</li>
                    </ul>
                </div>
            </div>

            {{-- 3. Rénovation & Aménagement --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center" style="background: #f8fafc; border: 1px solid #e2e8f0 !important; transition: all .3s ease;">
                    <div class="mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 20px; background: #10b981; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 28px; box-shadow: 0 8px 20px rgba(16,185,129,0.25);">
                        <i class="fa-solid fa-paint-roller"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #0d1b2a;">Rénovation & Second-Œuvre</h4>
                    <p class="text-muted small mb-3" style="line-height: 1.6;">
                        Modernisation de bâtiments anciens, staff décoratif, électricité, plomberie, carrelage d'importation et peinture de haute finition.
                    </p>
                    <ul class="list-unstyled text-muted small text-start ps-3 mb-0">
                        <li class="mb-1"><i class="fa-solid fa-circle-check text-success me-2"></i>Finitions intérieures luxueuses</li>
                        <li class="mb-1"><i class="fa-solid fa-circle-check text-success me-2"></i>Réfection de toitures & étanchéité</li>
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i>Pose de portails motorisés & sécurité</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     3. NOS RÉALISATIONS & CHANTIERS (AVEC FILTRES)
========================================================== --}}
<section class="py-5" style="background: #f1f5f9;">
    <div class="container py-lg-4">

        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
            <div>
                <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#fef3c7; color:#d97706; font-weight:700; letter-spacing:1px;">
                    <i class="fa-solid fa-hammer me-1"></i> Galerie de Chantiers
                </span>
                <h2 class="fw-bold display-6 mb-0" style="color: #0d1b2a;">
                    Nos Réalisations sur le Terrain
                </h2>
                <p class="text-muted mb-0 small">
                    Découvrez en images nos chantiers achevés, en cours d'exécution et nos projets à venir.
                </p>
            </div>

            {{-- Filtres par statut --}}
            <div class="d-inline-flex p-1 rounded-pill shadow-sm" style="background: #ffffff; border: 1px solid #e2e8f0;">
                <a href="{{ route('construction.index') }}" class="btn btn-sm rounded-pill px-3 py-1 fw-semibold {{ !request('status') ? 'btn-primary' : 'text-muted' }}">
                    Tous ({{ \App\Models\Construction::count() }})
                </a>
                <a href="{{ route('construction.index', ['status' => 'en_cours']) }}" class="btn btn-sm rounded-pill px-3 py-1 fw-semibold {{ request('status') == 'en_cours' ? 'btn-warning text-dark' : 'text-muted' }}">
                    En cours
                </a>
                <a href="{{ route('construction.index', ['status' => 'termine']) }}" class="btn btn-sm rounded-pill px-3 py-1 fw-semibold {{ request('status') == 'termine' ? 'btn-success text-white' : 'text-muted' }}">
                    Terminés
                </a>
                <a href="{{ route('construction.index', ['status' => 'a_venir']) }}" class="btn btn-sm rounded-pill px-3 py-1 fw-semibold {{ request('status') == 'a_venir' ? 'btn-info text-dark' : 'text-muted' }}">
                    À venir
                </a>
            </div>
        </div>

        {{-- Grille des réalisations --}}
        <div class="row g-4">
            @forelse($constructions as $construction)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden construction-card-item" style="background: #ffffff; transition: all .35s ease;">

                        {{-- Wrapper Image --}}
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            @php
                                $cImg = $construction->image
                                    ? asset('storage/' . $construction->image)
                                    : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80';
                            @endphp

                            <img
                                src="{{ $cImg }}"
                                class="w-100 h-100"
                                style="object-fit: cover; transition: transform 0.6s ease;"
                                alt="{{ $construction->title }}"
                                loading="lazy">

                            {{-- Badges flottants --}}
                            <div class="position-absolute top-0 start-0 m-3">
                                @if(in_array(strtolower($construction->status), ['termine', 'terminé', 'livre', 'livré']))
                                    <span class="badge bg-success px-3 py-2 rounded-pill shadow-sm fw-semibold">
                                        <i class="fa-solid fa-circle-check me-1"></i> Projet Terminé
                                    </span>
                                @elseif(in_array(strtolower($construction->status), ['en_cours', 'en cours']))
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm fw-semibold">
                                        <i class="fa-solid fa-spinner fa-spin me-1"></i> En Cours d'Exécution
                                    </span>
                                @else
                                    <span class="badge bg-info text-dark px-3 py-2 rounded-pill shadow-sm fw-semibold">
                                        <i class="fa-solid fa-clock me-1"></i> En Planification
                                    </span>
                                @endif
                            </div>

                            @if($construction->type)
                                <div class="position-absolute bottom-0 start-0 m-3">
                                    <span class="badge bg-dark bg-opacity-75 text-white px-3 py-2 rounded-pill shadow-sm" style="backdrop-filter: blur(6px); font-size: 11px;">
                                        <i class="fa-solid fa-tag me-1"></i> {{ $construction->type }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- Contenu Carte --}}
                        <div class="card-body p-4 d-flex flex-column">

                            @if($construction->location)
                                <p class="text-muted small mb-1 d-flex align-items-center">
                                    <i class="fa-solid fa-location-dot text-danger me-2"></i>
                                    <span class="fw-semibold">{{ $construction->location }}</span>
                                </p>
                            @endif

                            <h5 class="fw-bold mb-2 text-dark" style="min-height: 48px; line-height: 1.3;">
                                <a href="{{ route('construction.show', $construction) }}" class="text-dark text-decoration-none hover-primary">
                                    {{ $construction->title }}
                                </a>
                            </h5>

                            <p class="text-muted small mb-3 flex-grow-1" style="line-height: 1.6;">
                                {{ Str::limit($construction->description, 110) }}
                            </p>

                            <div class="mt-auto pt-3 border-top d-flex align-items-center justify-content-between">
                                <a href="{{ route('construction.show', $construction) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                                    <span>Découvrir le projet</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <a href="{{ $settings?->getEffectiveWhatsappUrl("Bonjour OneLove Immo, je suis intéressé par votre réalisation : " . $construction->title) ?? '#' }}" target="_blank" class="btn btn-sm text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background: #25D366;" title="Poser une question sur WhatsApp">
                                    <i class="fa-brands fa-whatsapp"></i>
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
                                <i class="fa-solid fa-building-circle-check fa-2x"></i>
                            </span>
                        </div>
                        <h4 class="fw-bold text-dark mb-2">Aucun projet ne correspond à ce filtre</h4>
                        <p class="text-muted mb-4 mx-auto" style="max-width: 500px;">
                            Changez de statut de filtre ou confiez-nous dès aujourd'hui la réalisation de votre propre chantier.
                        </p>
                        <a href="{{ route('construction.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold">
                            Voir tous les chantiers
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($constructions->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $constructions->links() }}
            </div>
        @endif

    </div>
</section>


{{-- =========================================================
     4. PROCESSUS DE CONSTRUCTION EN 4 ÉTAPES
========================================================== --}}
<section class="py-5" style="background:#ffffff;">
    <div class="container py-lg-4">

        <div class="text-center mb-5">
            <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#e0f2fe; color:#0369a1; font-weight:700; letter-spacing:1px;">
                <i class="fa-solid fa-list-ol me-1"></i> Notre Méthodologie
            </span>
            <h2 class="fw-bold display-6" style="color: #0d1b2a;">
                Un Déroulement Méthodique & Transparent
            </h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Chaque étape est validée avec vous pour une maîtrise totale du délai et du budget.
            </p>
        </div>

        <div class="row g-4 text-center">

            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border: 1px dashed #cbd5e1;">
                    <div class="mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; background: #0F4C81; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: bold;">
                        1
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Visite & Étude de Sol</h5>
                    <p class="text-muted small mb-0">
                        Examen minutieux de votre parcelle, analyse topographique et définition des contraintes techniques du terrain.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border: 1px dashed #cbd5e1;">
                    <div class="mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; background: #F97316; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: bold;">
                        2
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Conception & Devis 3D</h5>
                    <p class="text-muted small mb-0">
                        Dessin des plans architecturaux, modélisation 3D immersive et établissement d'un devis chiffré poste par poste.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border: 1px dashed #cbd5e1;">
                    <div class="mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; background: #0F4C81; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: bold;">
                        3
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Exécution Sous Contrôle</h5>
                    <p class="text-muted small mb-0">
                        Coulage du béton, élévation, charpente et second-œuvre avec des comptes-rendus photo réguliers pour votre sérénité.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border: 1px dashed #cbd5e1;">
                    <div class="mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%; background: #10b981; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: bold;">
                        4
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Livraison Clé en Main</h5>
                    <p class="text-muted small mb-0">
                        Nettoyage complet, réception des travaux avec procès-verbal et remise officielle des clés de votre nouvelle propriété.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     5. BANNIÈRE D'APPEL À L'ACTION (DEVIS CONSTRUCTION)
========================================================== --}}
<section class="py-5" style="background: #f8fafc;">
    <div class="container py-lg-3">
        <div class="p-4 p-md-5 rounded-4 text-white text-center position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #0d1b2a 0%, #0F4C81 100%); box-shadow: 0 20px 40px rgba(0,0,0,0.15);">
            <div style="position: absolute; top:-50px; right:-50px; width:250px; height:250px; background:radial-gradient(circle, rgba(249,115,22,0.3) 0%, rgba(0,0,0,0) 70%); border-radius:50%;"></div>

            <div class="position-relative" style="z-index: 1; max-width: 720px; margin: 0 auto;">
                <span class="badge px-3 py-2 text-uppercase mb-3" style="background: rgba(249,115,22,0.25); color:#F97316; font-weight:700;">
                    <i class="fa-solid fa-calculator me-1"></i> Étude & Chiffrage Gratuit
                </span>

                <h2 class="display-6 fw-bold mb-3">
                    Vous Avez Un Terrain Ou Un Projet De Construction ?
                </h2>

                <p class="text-white-50 mb-4" style="font-size: 16px; line-height: 1.7;">
                    Transmettez-nous vos besoins ou vos plans. Nos ingénieurs élaborent pour vous une proposition financière et technique sur-mesure sous 48 heures.
                </p>

                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    <a href="{{ route('quotes.create') }}" class="btn btn-warning fw-bold px-4 py-3 shadow" style="border-radius: 10px;">
                        <i class="fa-solid fa-file-signature me-2"></i> Remplir une demande de devis
                    </a>

                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold px-4 py-3 shadow" style="background: #25D366; border-radius: 10px;">
                        <i class="fa-brands fa-whatsapp fs-5 me-2"></i> Discuter sur WhatsApp
                    </a>

                    <a href="{{ route('contact') }}" class="btn btn-outline-light fw-bold px-4 py-3" style="border-radius: 10px;">
                        <i class="fa-solid fa-envelope me-2"></i> Nous écrire
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .construction-card-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.12) !important;
    }
    .construction-card-item:hover img {
        transform: scale(1.06);
    }
    .hover-primary:hover {
        color: #0F4C81 !important;
    }
</style>

@endsection