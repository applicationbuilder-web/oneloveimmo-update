@extends('layouts.app')

@section('title', 'À propos de OneLove Immo — Excellence Immobilière & Construction')

@section('content')

@php
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl("Bonjour OneLove Immo, je viens de découvrir votre page À propos et je souhaite échanger sur un projet.")
        ?? 'https://wa.me/242060000000?text=' . urlencode("Bonjour OneLove Immo, je souhaite échanger avec vous.");
    
    $aboutImg = ($settings && $settings->about_image) 
        ? asset('storage/'.$settings->about_image) 
        : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';
@endphp

{{-- =========================================================
     1. HERO SECTION HAUT DE GAMME
========================================================== --}}
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 60%, #0F4C81 100%); color: #ffffff;">
    {{-- Effets de lumière de fond --}}
    <div style="position:absolute; top:-100px; right:-100px; width:450px; height:450px; background:radial-gradient(circle, rgba(20,120,255,0.2) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-120px; left:-120px; width:450px; height:450px; background:radial-gradient(circle, rgba(249,115,22,0.18) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>

    <div class="container py-4 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <nav aria-label="breadcrumb" class="mb-3 d-inline-block">
                    <ol class="breadcrumb justify-content-center px-3 py-1 rounded-pill" style="background: rgba(255,255,255,0.08); font-size: 13px;">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">À propos</li>
                    </ol>
                </nav>

                <span class="badge px-3 py-2 text-uppercase mb-3 d-inline-block shadow-sm" style="background: rgba(249, 115, 22, 0.2); color: #F97316; border: 1px solid rgba(249, 115, 22, 0.4); font-weight: 700; letter-spacing: 1px;">
                    <i class="fa-solid fa-gem me-1"></i> Notre Histoire & Nos Engagements
                </span>

                <h1 class="display-4 fw-bold mb-3" style="letter-spacing: -0.5px;">
                    Bâtir l'Avenir, Réaliser <span style="background: linear-gradient(135deg, #F97316, #ffbf00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Vos Rêves Immobiliers</span>
                </h1>

                <p class="lead text-white-50 mb-4" style="line-height: 1.8; font-size: 18px;">
                    OneLove Immo est votre partenaire de confiance au Congo pour l'achat, la vente, la conception architecturale et la réalisation de vos chantiers de construction.
                </p>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('quotes.create') }}" class="btn btn-warning fw-bold px-4 py-3 shadow" style="border-radius: 10px;">
                        <i class="fa-solid fa-file-signature me-2"></i> Demander un devis
                    </a>
                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light fw-bold px-4 py-3" style="border-radius: 10px;">
                        <i class="fa-brands fa-whatsapp me-2 text-success"></i> Discuter sur WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
     2. QUI SOMMES-NOUS ? (PRÉSENTATION DÉTAILLÉE)
========================================================== --}}
<section class="py-5" style="background:#ffffff;">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">

            {{-- Image avec badge d'expérience flottant --}}
            <div class="col-lg-6">
                <div class="position-relative">
                    <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 20px 45px rgba(0,0,0,0.12); position: relative;">
                        <img
                            src="{{ $aboutImg }}"
                            class="img-fluid w-100"
                            style="height: 480px; object-fit: cover; display: block;"
                            alt="À propos de OneLove Immo">
                        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0) 60%, rgba(13,27,42,0.6) 100%);"></div>
                    </div>

                    {{-- Badge flottant --}}
                    <div class="position-absolute p-3 shadow-lg rounded-4 text-white d-flex align-items-center gap-3"
                         style="bottom: -25px; right: 20px; background: linear-gradient(135deg, #0d1b2a, #0F4C81); border: 2px solid rgba(255,255,255,0.2); max-width: 280px;">
                        <div style="width: 54px; height: 54px; border-radius: 14px; background: linear-gradient(135deg, #F97316, #ea580c); display: flex; align-items: center; justify-content: center; font-size: 24px; color: #fff; flex-shrink: 0;">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <div>
                            <span class="d-block display-6 fw-bold text-warning mb-0" style="line-height: 1;">
                                {{ $settings?->getEffectiveExperienceCount() ?? '5' }}+
                            </span>
                            <span class="small text-white-50 fw-semibold" style="font-size: 12px; line-height: 1.2; display: block;">
                                Années d'excellence & de projets réussis
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenu éditorial --}}
            <div class="col-lg-6">
                <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#eff6ff; color:#0F4C81; font-weight:700; letter-spacing:1px;">
                    <i class="fa-solid fa-building me-1"></i> Qui sommes-nous ?
                </span>

                <h2 class="fw-bold display-6 mb-3" style="color: #0d1b2a; line-height: 1.25;">
                    L'Excellence Immobilière et la Rigueur de la Construction au Congo
                </h2>

                <p class="text-muted" style="line-height: 1.8; font-size: 16px;">
                    Fondée avec l'ambition de transformer le paysage urbain et d'apporter une réponse professionnelle et sécurisée aux acquéreurs, <strong>OneLove Immo</strong> s'est imposée comme une référence incontournable au Congo (Brazzaville, Pointe-Noire et leurs environs).
                </p>

                <p class="text-muted" style="line-height: 1.8; font-size: 16px;">
                    Que vous cherchiez la villa de vos rêves, un terrain titré sans litige, un projet de construction clé en main ou une rénovation de standing, notre équipe pluridisciplinaire d'architectes, d'ingénieurs et de conseillers fonciers met tout son savoir-faire à votre service.
                </p>

                {{-- Liste des engagements clés --}}
                <div class="mt-4 pt-2">
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3 mt-1" style="width: 28px; height: 28px; border-radius: 50%; background: #dcfce7; color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0;">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <strong style="color: #0d1b2a;">Sécurisation Foncière & Transparence Notariée</strong>
                            <p class="text-muted small mb-0">Tous nos biens et terrains sont scrupuleusement vérifiés (titres fonciers, plans cadastraux, conformité légale).</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3 mt-1" style="width: 28px; height: 28px; border-radius: 50%; background: #dcfce7; color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0;">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <strong style="color: #0d1b2a;">Conception Architecturale 3D & Plans d'Exécution</strong>
                            <p class="text-muted small mb-0">Modélisation moderne, optimisation de l'aération et respect des normes bioclimatiques de la sous-région.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3 mt-1" style="width: 28px; height: 28px; border-radius: 50%; background: #dcfce7; color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0;">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <strong style="color: #0d1b2a;">Respect des Délais et Maîtrise des Budgets</strong>
                            <p class="text-muted small mb-0">Un cahier des charges clair, aucun coût caché, et des rapports réguliers sur l'avancement des chantiers.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-2">
                    <a href="{{ route('properties.index') }}" class="btn btn-outline-primary fw-semibold px-4 py-2 me-2" style="border-radius: 8px;">
                        <i class="fa-solid fa-house-chimney me-1"></i> Explorer nos biens
                    </a>
                    <a href="{{ route('construction.index') }}" class="btn btn-outline-secondary fw-semibold px-4 py-2" style="border-radius: 8px;">
                        <i class="fa-solid fa-person-digging me-1"></i> Nos réalisations
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>


{{-- =========================================================
     3. NOS VALEURS FONDAMENTALES & PILIERS
========================================================== --}}
<section class="py-5" style="background: #f8fafc;">
    <div class="container py-lg-4">

        <div class="text-center mb-5">
            <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#fef3c7; color:#d97706; font-weight:700; letter-spacing:1px;">
                <i class="fa-solid fa-compass me-1"></i> Ce qui nous guide
            </span>
            <h2 class="fw-bold display-6" style="color: #0d1b2a;">
                Nos Valeurs et Piliers d'Action
            </h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Chaque projet immobilier ou de construction est porté par des principes forts garantissant la satisfaction totale de nos clients.
            </p>
        </div>

        <div class="row g-4">

            {{-- 1. Mission --}}
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4" style="background:#ffffff; transition: transform .3s ease, box-shadow .3s ease;">
                    <div class="mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 18px; background: #eff6ff; color: #1478ff; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #0d1b2a;">Notre Mission</h4>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">
                        Démocratiser l'accès à un habitat de qualité, sécurisé et durable, en offrant des solutions d'achat, de vente et de construction adaptées à chaque budget.
                    </p>
                </div>
            </div>

            {{-- 2. Vision --}}
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4" style="background:#ffffff; transition: transform .3s ease, box-shadow .3s ease;">
                    <div class="mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 18px; background: #ecfdf5; color: #10b981; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #0d1b2a;">Notre Vision</h4>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">
                        Être l'acteur de référence dans l'immobilier moderne et le génie civil en République du Congo et dans la sous-région Afrique Centrale.
                    </p>
                </div>
            </div>

            {{-- 3. Intégrité --}}
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4" style="background:#ffffff; transition: transform .3s ease, box-shadow .3s ease;">
                    <div class="mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 18px; background: #fffbeb; color: #f59e0b; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                        <i class="fa-solid fa-handshake-angle"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #0d1b2a;">Intégrité Totale</h4>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">
                        La transparence foncière et financière est au cœur de notre engagement : conseils loyaux, contrats rigoureux et contrôle minutieux des documents.
                    </p>
                </div>
            </div>

            {{-- 4. Qualité --}}
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4" style="background:#ffffff; transition: transform .3s ease, box-shadow .3s ease;">
                    <div class="mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 18px; background: #fdf2f8; color: #ec4899; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #0d1b2a;">Excellence</h4>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">
                        De l'acier aux finitions de carrelage, nous sélectionnons des matériaux éprouvés pour vous garantir des ouvrages durables et esthétiques.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     4. NOS 4 DOMAINES D'EXPERTISE MAJEURS
========================================================== --}}
<section class="py-5" style="background: #ffffff;">
    <div class="container py-lg-4">

        <div class="row align-items-end mb-5">
            <div class="col-lg-8">
                <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#eff6ff; color:#0F4C81; font-weight:700; letter-spacing:1px;">
                    <i class="fa-solid fa-cubes me-1"></i> Notre Savoir-Faire
                </span>
                <h2 class="fw-bold display-6 mb-2" style="color: #0d1b2a;">
                    Nos 4 Piliers d'Intervention
                </h2>
                <p class="text-muted mb-0">
                    Un service intégré pour couvrir l'intégralité du cycle de vie de votre investissement immobilier.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('quotes.create') }}" class="btn btn-primary fw-semibold px-4 py-2" style="border-radius: 8px;">
                    <i class="fa-solid fa-calculator me-1"></i> Estimer un projet
                </a>
            </div>
        </div>

        <div class="row g-4">

            {{-- 1. Transactions --}}
            <div class="col-md-6 col-lg-3">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border:1px solid #e2e8f0;">
                    <div class="mb-3" style="width: 48px; height: 48px; border-radius: 12px; background: #0F4C81; color:#fff; display:flex; align-items:center; justify-content:center; font-size: 20px;">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Transaction Immobilière</h5>
                    <p class="text-muted small mb-3">
                        Vente, achat et location de villas de standing, appartements sécurisés, parcelles titrées et locaux d'entreprise.
                    </p>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Visites guidées</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Négociation équitable</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Actes notariés</li>
                    </ul>
                </div>
            </div>

            {{-- 2. Construction --}}
            <div class="col-md-6 col-lg-3">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border:1px solid #e2e8f0;">
                    <div class="mb-3" style="width: 48px; height: 48px; border-radius: 12px; background: #F97316; color:#fff; display:flex; align-items:center; justify-content:center; font-size: 20px;">
                        <i class="fa-solid fa-trowel-bricks"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Construction & Gros-Œuvre</h5>
                    <p class="text-muted small mb-3">
                        Réalisation de fondations solides, élévation de villas modernes, immeubles R+ et infrastructures clés en main.
                    </p>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Béton armé certifié</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Supervision sur site</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Garantie décennale</li>
                    </ul>
                </div>
            </div>

            {{-- 3. Architecture --}}
            <div class="col-md-6 col-lg-3">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border:1px solid #e2e8f0;">
                    <div class="mb-3" style="width: 48px; height: 48px; border-radius: 12px; background: #10b981; color:#fff; display:flex; align-items:center; justify-content:center; font-size: 20px;">
                        <i class="fa-solid fa-compass-drafting"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Architecture & Plans 3D</h5>
                    <p class="text-muted small mb-3">
                        Esquisses, plans de distribution fonctionnels, permis de construire et rendus 3D ultra-réalistes avant le premier coup de pioche.
                    </p>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Visite virtuelle 3D</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Optimisation lumière</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Dossiers administratifs</li>
                    </ul>
                </div>
            </div>

            {{-- 4. Rénovation --}}
            <div class="col-md-6 col-lg-3">
                <div class="p-4 rounded-4 h-100" style="background:#f8fafc; border:1px solid #e2e8f0;">
                    <div class="mb-3" style="width: 48px; height: 48px; border-radius: 12px; background: #8b5cf6; color:#fff; display:flex; align-items:center; justify-content:center; font-size: 20px;">
                        <i class="fa-solid fa-paint-roller"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Rénovation & Finitions</h5>
                    <p class="text-muted small mb-3">
                        Modernisation complète de bâtiments existants, peinture décorative, carrelage d'importation, électricité et plomberie aux normes.
                    </p>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Staff & faux-plafonds</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Cuisines équipées</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Sécurisation & clôtures</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     5. NOTRE MÉTHODE EN 4 ÉTAPES (PROCESSUS CLÉ EN MAIN)
========================================================== --}}
<section class="py-5" style="background: #f1f5f9;">
    <div class="container py-lg-4">

        <div class="text-center mb-5">
            <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#e0f2fe; color:#0369a1; font-weight:700; letter-spacing:1px;">
                <i class="fa-solid fa-stairs me-1"></i> Notre Démarche
            </span>
            <h2 class="fw-bold display-6" style="color: #0d1b2a;">
                Comment Nous Réalisons Votre Projet
            </h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Un accompagnement transparent et structuré de la prise de contact jusqu'à la remise des clés.
            </p>
        </div>

        <div class="row g-4 position-relative">

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white position-relative">
                    <span class="display-4 fw-bold position-absolute" style="top: 15px; right: 20px; color: #f1f5f9; z-index: 0;">01</span>
                    <div class="position-relative" style="z-index: 1;">
                        <div class="mb-3" style="width: 44px; height: 44px; border-radius: 50%; background: #0F4C81; color:#fff; display: flex; align-items:center; justify-content:center; font-weight:700;">
                            1
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Écoute & Cadrage</h5>
                        <p class="text-muted small mb-0">
                            Nous analysons en détail vos attentes, vos impératifs de localisation, de superficie et votre enveloppe budgétaire.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white position-relative">
                    <span class="display-4 fw-bold position-absolute" style="top: 15px; right: 20px; color: #f1f5f9; z-index: 0;">02</span>
                    <div class="position-relative" style="z-index: 1;">
                        <div class="mb-3" style="width: 44px; height: 44px; border-radius: 50%; background: #0F4C81; color:#fff; display: flex; align-items:center; justify-content:center; font-weight:700;">
                            2
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Étude & Conception</h5>
                        <p class="text-muted small mb-0">
                            Sélection des biens certifiés ou élaboration des plans architecturaux 3D avec un devis détaillé transparent.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white position-relative">
                    <span class="display-4 fw-bold position-absolute" style="top: 15px; right: 20px; color: #f1f5f9; z-index: 0;">03</span>
                    <div class="position-relative" style="z-index: 1;">
                        <div class="mb-3" style="width: 44px; height: 44px; border-radius: 50%; background: #0F4C81; color:#fff; display: flex; align-items:center; justify-content:center; font-weight:700;">
                            3
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Exécution Rigoureuse</h5>
                        <p class="text-muted small mb-0">
                            Signature notariée sécurisée ou démarrage des travaux avec un suivi technique permanent et comptes-rendus photo/vidéo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white position-relative">
                    <span class="display-4 fw-bold position-absolute" style="top: 15px; right: 20px; color: #f1f5f9; z-index: 0;">04</span>
                    <div class="position-relative" style="z-index: 1;">
                        <div class="mb-3" style="width: 44px; height: 44px; border-radius: 50%; background: #10b981; color:#fff; display: flex; align-items:center; justify-content:center; font-weight:700;">
                            4
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Livraison Clé en Main</h5>
                        <p class="text-muted small mb-0">
                            Remise solennelle des clés et des titres de propriété, avec un service après-vente dévoué à votre écoute continue.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     6. CHIFFRES CLÉS & STATISTIQUES EN DIRECT
========================================================== --}}
<section class="py-5 position-relative text-white" style="background: linear-gradient(135deg, #0d1b2a 0%, #0F4C81 100%);">
    <div class="container py-lg-4">

        <div class="text-center mb-5">
            <span class="badge px-3 py-2 text-uppercase mb-2" style="background:rgba(255,255,255,0.1); color:#ffbf00; font-weight:700; letter-spacing:1px;">
                <i class="fa-solid fa-chart-pie me-1"></i> Preuve de Confiance
            </span>
            <h2 class="fw-bold display-6">
                Pourquoi Nous Faire Confiance ?
            </h2>
            <p class="text-white-50 mx-auto" style="max-width: 600px;">
                Des résultats tangibles qui témoignent de l'engagement quotidien de OneLove Immo auprès de ses partenaires et clients.
            </p>
        </div>

        <div class="row g-4 text-center">

            {{-- 1. Biens --}}
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(8px);">
                    <div class="mb-2 text-warning fs-3">
                        <i class="fa-solid fa-house-chimney"></i>
                    </div>
                    <div class="display-5 fw-bold text-white mb-1">
                        {{ $settings?->getEffectivePropertiesCount() ?? \App\Models\Property::count() }}
                    </div>
                    <span class="text-white-50 fw-semibold small text-uppercase" style="letter-spacing: 0.5px;">Biens Enregistrés</span>
                </div>
            </div>

            {{-- 2. Projets --}}
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(8px);">
                    <div class="mb-2 text-warning fs-3">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div class="display-5 fw-bold text-white mb-1">
                        {{ $settings?->getEffectiveProjectsCount() ?? \App\Models\Construction::count() }}
                    </div>
                    <span class="text-white-50 fw-semibold small text-uppercase" style="letter-spacing: 0.5px;">Projets Réalisés</span>
                </div>
            </div>

            {{-- 3. Clients --}}
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(8px);">
                    <div class="mb-2 text-warning fs-3">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="display-5 fw-bold text-white mb-1">
                        {{ $settings?->getEffectiveClientsCount() ?? (\App\Models\Quote::count() + \App\Models\Contact::count()) }}
                    </div>
                    <span class="text-white-50 fw-semibold small text-uppercase" style="letter-spacing: 0.5px;">Clients & Demandes</span>
                </div>
            </div>

            {{-- 4. Expérience --}}
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(8px);">
                    <div class="mb-2 text-warning fs-3">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="display-5 fw-bold text-white mb-1">
                        {{ $settings?->getEffectiveExperienceCount() ?? '5' }} Ans
                    </div>
                    <span class="text-white-50 fw-semibold small text-uppercase" style="letter-spacing: 0.5px;">D'Expérience Terrain</span>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     7. BANNIÈRE D'APPEL À L'ACTION (CTA FINAL)
========================================================== --}}
<section class="py-5" style="background: #ffffff;">
    <div class="container py-lg-3">
        <div class="p-4 p-md-5 rounded-4 text-white text-center position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #075E54 0%, #0d1b2a 100%); box-shadow: 0 20px 40px rgba(0,0,0,0.15);">
            <div style="position: absolute; top:-50px; right:-50px; width:250px; height:250px; background:radial-gradient(circle, rgba(37,211,102,0.3) 0%, rgba(0,0,0,0) 70%); border-radius:50%;"></div>

            <div class="position-relative" style="z-index: 1; max-width: 720px; margin: 0 auto;">
                <span class="badge px-3 py-2 text-uppercase mb-3" style="background: rgba(37,211,102,0.2); color:#25D366; font-weight:700;">
                    <i class="fa-solid fa-rocket me-1"></i> Prêt à concrétiser votre vision ?
                </span>

                <h2 class="display-6 fw-bold mb-3">
                    Donnons Vie À Votre Futur Projet Immobilier
                </h2>

                <p class="text-white-50 mb-4" style="font-size: 16px; line-height: 1.7;">
                    Qu'il s'agisse d'un investissement locatif, de l'acquisition d'une parcelle sécurisée ou de la construction de votre villa, nos experts vous accompagnent immédiatement.
                </p>

                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    <a href="{{ route('quotes.create') }}" class="btn btn-warning fw-bold px-4 py-3 shadow" style="border-radius: 10px;">
                        <i class="fa-solid fa-file-signature me-2"></i> Demander un devis gratuit
                    </a>

                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold px-4 py-3 shadow" style="background: #25D366; border-radius: 10px;">
                        <i class="fa-brands fa-whatsapp fs-5 me-2"></i> Échanger sur WhatsApp
                    </a>

                    <a href="{{ route('contact') }}" class="btn btn-outline-light fw-bold px-4 py-3" style="border-radius: 10px;">
                        <i class="fa-solid fa-envelope me-2"></i> Page contact
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection