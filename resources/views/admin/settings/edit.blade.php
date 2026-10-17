@extends('layouts.admin')

@section('title', 'Paramètres du site')
@section('page-title', 'Paramètres du site')
@section('page-subtitle', 'Images de couverture, coordonnées, réseaux sociaux et chiffres clés')

@section('content')

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- =========================================================
         1. IMAGES DU SITE
    ========================================================== --}}
    <div class="adm-card mb-4">
        <div class="adm-card-header">
            <div class="d-flex align-items-center gap-3">
                <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#0F4C81,#1478ff);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:18px;box-shadow:0 4px 14px rgba(15,76,129,0.35);flex-shrink:0;">
                    <i class="fa-solid fa-images"></i>
                </div>
                <div>
                    <h4 class="mb-1">Images & Bannières du site</h4>
                    <p class="mb-0 text-muted">Personnalisez les visuels affichés sur la page d'accueil et les sections clés</p>
                </div>
            </div>
            <span class="adm-badge adm-badge-primary">6 emplacements</span>
        </div>

        <div class="adm-card-body">
            <div class="row g-4">

                {{-- HERO ACCUEIL --}}
                <div class="col-md-6 col-lg-4">
                    <div class="h-100 p-3 rounded-4" style="background:var(--adm-bg);border:1px solid var(--adm-border);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0 fw-bold">Hero — Accueil</label>
                            @if($settings->hero_image)
                                <span class="adm-badge adm-badge-success" style="font-size:11px;">En ligne</span>
                            @else
                                <span class="adm-badge adm-badge-warning" style="font-size:11px;">Défaut</span>
                            @endif
                        </div>
                        <div class="mb-3 position-relative rounded-3 overflow-hidden" style="height:170px;background:rgba(0,0,0,0.05);border:1px dashed var(--adm-border);">
                            @if($settings->hero_image)
                                <img src="{{ asset('storage/'.$settings->hero_image) }}" class="w-100 h-100" style="object-fit:cover;" alt="Hero Image">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-image fa-2x mb-2" style="opacity:0.4;"></i>
                                    <span style="font-size:12px;">Image par défaut</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="hero_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        <div class="form-text">Bannière principale de la page d'accueil.</div>
                    </div>
                </div>

                {{-- CONSTRUCTION --}}
                <div class="col-md-6 col-lg-4">
                    <div class="h-100 p-3 rounded-4" style="background:var(--adm-bg);border:1px solid var(--adm-border);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0 fw-bold">Bannière Construction</label>
                            @if($settings->construction_image)
                                <span class="adm-badge adm-badge-success" style="font-size:11px;">En ligne</span>
                            @else
                                <span class="adm-badge adm-badge-warning" style="font-size:11px;">Défaut</span>
                            @endif
                        </div>
                        <div class="mb-3 position-relative rounded-3 overflow-hidden" style="height:170px;background:rgba(0,0,0,0.05);border:1px dashed var(--adm-border);">
                            @if($settings->construction_image)
                                <img src="{{ asset('storage/'.$settings->construction_image) }}" class="w-100 h-100" style="object-fit:cover;" alt="Construction Image">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-building fa-2x mb-2" style="opacity:0.4;"></i>
                                    <span style="font-size:12px;">Image par défaut</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="construction_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        <div class="form-text">En-tête de la page Construction & BTP.</div>
                    </div>
                </div>

                {{-- ABOUT --}}
                <div class="col-md-6 col-lg-4">
                    <div class="h-100 p-3 rounded-4" style="background:var(--adm-bg);border:1px solid var(--adm-border);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0 fw-bold">Section À propos</label>
                            @if($settings->about_image)
                                <span class="adm-badge adm-badge-success" style="font-size:11px;">En ligne</span>
                            @else
                                <span class="adm-badge adm-badge-warning" style="font-size:11px;">Défaut</span>
                            @endif
                        </div>
                        <div class="mb-3 position-relative rounded-3 overflow-hidden" style="height:170px;background:rgba(0,0,0,0.05);border:1px dashed var(--adm-border);">
                            @if($settings->about_image)
                                <img src="{{ asset('storage/'.$settings->about_image) }}" class="w-100 h-100" style="object-fit:cover;" alt="About Image">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-users-gear fa-2x mb-2" style="opacity:0.4;"></i>
                                    <span style="font-size:12px;">Image par défaut</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="about_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        <div class="form-text">Illustration de présentation de l'agence.</div>
                    </div>
                </div>

                {{-- PROJET 1 --}}
                <div class="col-md-6 col-lg-4">
                    <div class="h-100 p-3 rounded-4" style="background:var(--adm-bg);border:1px solid var(--adm-border);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0 fw-bold">Projet Showcase 1</label>
                            @if($settings->project_image_1)
                                <span class="adm-badge adm-badge-success" style="font-size:11px;">En ligne</span>
                            @else
                                <span class="adm-badge adm-badge-warning" style="font-size:11px;">Non défini</span>
                            @endif
                        </div>
                        <div class="mb-3 position-relative rounded-3 overflow-hidden" style="height:170px;background:rgba(0,0,0,0.05);border:1px dashed var(--adm-border);">
                            @if($settings->project_image_1)
                                <img src="{{ asset('storage/'.$settings->project_image_1) }}" class="w-100 h-100" style="object-fit:cover;" alt="Projet 1">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-house-laptop fa-2x mb-2" style="opacity:0.4;"></i>
                                    <span style="font-size:12px;">Aucune image</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="project_image_1" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        <div class="form-text">Vitrine de projet #1.</div>
                    </div>
                </div>

                {{-- PROJET 2 --}}
                <div class="col-md-6 col-lg-4">
                    <div class="h-100 p-3 rounded-4" style="background:var(--adm-bg);border:1px solid var(--adm-border);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0 fw-bold">Projet Showcase 2</label>
                            @if($settings->project_image_2)
                                <span class="adm-badge adm-badge-success" style="font-size:11px;">En ligne</span>
                            @else
                                <span class="adm-badge adm-badge-warning" style="font-size:11px;">Non défini</span>
                            @endif
                        </div>
                        <div class="mb-3 position-relative rounded-3 overflow-hidden" style="height:170px;background:rgba(0,0,0,0.05);border:1px dashed var(--adm-border);">
                            @if($settings->project_image_2)
                                <img src="{{ asset('storage/'.$settings->project_image_2) }}" class="w-100 h-100" style="object-fit:cover;" alt="Projet 2">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-house-laptop fa-2x mb-2" style="opacity:0.4;"></i>
                                    <span style="font-size:12px;">Aucune image</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="project_image_2" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        <div class="form-text">Vitrine de projet #2.</div>
                    </div>
                </div>

                {{-- PROJET 3 --}}
                <div class="col-md-6 col-lg-4">
                    <div class="h-100 p-3 rounded-4" style="background:var(--adm-bg);border:1px solid var(--adm-border);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0 fw-bold">Projet Showcase 3</label>
                            @if($settings->project_image_3)
                                <span class="adm-badge adm-badge-success" style="font-size:11px;">En ligne</span>
                            @else
                                <span class="adm-badge adm-badge-warning" style="font-size:11px;">Non défini</span>
                            @endif
                        </div>
                        <div class="mb-3 position-relative rounded-3 overflow-hidden" style="height:170px;background:rgba(0,0,0,0.05);border:1px dashed var(--adm-border);">
                            @if($settings->project_image_3)
                                <img src="{{ asset('storage/'.$settings->project_image_3) }}" class="w-100 h-100" style="object-fit:cover;" alt="Projet 3">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-house-laptop fa-2x mb-2" style="opacity:0.4;"></i>
                                    <span style="font-size:12px;">Aucune image</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="project_image_3" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        <div class="form-text">Vitrine de projet #3.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- =========================================================
         2. COORDONNÉES & CONTACT
    ========================================================== --}}
    <div class="adm-card mb-4">
        <div class="adm-card-header">
            <div class="d-flex align-items-center gap-3">
                <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#F97316,#ea580c);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:18px;box-shadow:0 4px 14px rgba(249,115,22,0.35);flex-shrink:0;">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <div>
                    <h4 class="mb-1">Coordonnées de l'agence</h4>
                    <p class="mb-0 text-muted">Visibles sur le pied de page, les mentions légales et la page de contact</p>
                </div>
            </div>
        </div>

        <div class="adm-card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa-solid fa-location-dot text-danger me-1"></i> Adresse physique
                    </label>
                    <input type="text" name="contact_address" class="form-control"
                           value="{{ old('contact_address', $settings->contact_address) }}"
                           placeholder="Ex : Brazzaville, République du Congo">
                </div>

                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa-solid fa-phone text-success me-1"></i> Téléphone principal
                    </label>
                    <input type="text" name="contact_phone" class="form-control"
                           value="{{ old('contact_phone', $settings->contact_phone) }}"
                           placeholder="Ex : +242 06 123 45 67">
                </div>

                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa-solid fa-envelope text-primary me-1"></i> Email officiel
                    </label>
                    <input type="email" name="contact_email" class="form-control"
                           value="{{ old('contact_email', $settings->contact_email) }}"
                           placeholder="Ex : contact@oneloveimmo.com">
                </div>
            </div>
        </div>
    </div>

    {{-- =========================================================
         3. RÉSEAUX SOCIAUX & WHATSAPP
    ========================================================== --}}
    <div class="adm-card mb-4">
        <div class="adm-card-header">
            <div class="d-flex align-items-center gap-3">
                <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#10b981,#059669);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:18px;box-shadow:0 4px 14px rgba(16,185,129,0.35);flex-shrink:0;">
                    <i class="fa-solid fa-share-nodes"></i>
                </div>
                <div>
                    <h4 class="mb-1">Réseaux sociaux & Messageries</h4>
                    <p class="mb-0 text-muted">Liens directs pour vos visiteurs et prospects</p>
                </div>
            </div>
        </div>

        <div class="adm-card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa-brands fa-facebook text-primary me-1"></i> Page Facebook
                    </label>
                    <input type="url" name="facebook_url" class="form-control"
                           value="{{ old('facebook_url', $settings->facebook_url) }}"
                           placeholder="https://facebook.com/votrepage">
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa-brands fa-instagram text-danger me-1"></i> Profil Instagram
                    </label>
                    <input type="url" name="instagram_url" class="form-control"
                           value="{{ old('instagram_url', $settings->instagram_url) }}"
                           placeholder="https://instagram.com/votreprofil">
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa-brands fa-linkedin text-info me-1"></i> Page LinkedIn
                    </label>
                    <input type="url" name="linkedin_url" class="form-control"
                           value="{{ old('linkedin_url', $settings->linkedin_url) }}"
                           placeholder="https://linkedin.com/company/...">
                </div>

                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center justify-content-between">
                        <span><i class="fa-brands fa-whatsapp text-success me-1"></i> WhatsApp officiel</span>
                        @if($settings->getEffectiveWhatsappUrl())
                            <a href="{{ $settings->getEffectiveWhatsappUrl() }}" target="_blank" class="small text-success text-decoration-none fw-semibold">
                                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Tester
                            </a>
                        @endif
                    </label>
                    <input type="text" name="whatsapp_url" class="form-control"
                           value="{{ old('whatsapp_url', $settings->whatsapp_url) }}"
                           placeholder="Ex : +242 06 123 45 67 ou https://wa.me/242061234567">
                    <div class="form-text">Numéro direct ou lien wa.me. Si vide, le téléphone sera utilisé.</div>
                </div>
            </div>
        </div>
    </div>

    {{-- =========================================================
         4. CHIFFRES CLÉS & STATISTIQUES
    ========================================================== --}}
    <div class="adm-card mb-4">
        <div class="adm-card-header">
            <div class="d-flex align-items-center gap-3">
                <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#ffbf00,#d97706);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:18px;box-shadow:0 4px 14px rgba(255,191,0,0.35);flex-shrink:0;">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <h4 class="mb-1">Chiffres clés de réputation</h4>
                    <p class="mb-0 text-muted">Affichés dans la section « Pourquoi nous faire confiance »</p>
                </div>
            </div>
        </div>

        <div class="adm-card-body">
            <div class="row g-3">
                <div class="col-sm-6 col-lg-3">
                    <label class="form-label">Biens vendus / dispo</label>
                    <input type="text" name="stat_properties" class="form-control"
                           value="{{ old('stat_properties', $settings->stat_properties) }}"
                           placeholder="Ex : 120+">
                    <div class="form-text">En base : {{ \App\Models\Property::count() }} bien(s)</div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <label class="form-label">Projets réalisés</label>
                    <input type="text" name="stat_projects" class="form-control"
                           value="{{ old('stat_projects', $settings->stat_projects) }}"
                           placeholder="Ex : 80+">
                    <div class="form-text">En base : {{ \App\Models\Construction::count() }} projet(s)</div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <label class="form-label">Clients satisfaits</label>
                    <input type="text" name="stat_clients" class="form-control"
                           value="{{ old('stat_clients', $settings->stat_clients) }}"
                           placeholder="Ex : 350+">
                </div>

                <div class="col-sm-6 col-lg-3">
                    <label class="form-label">Années d'expérience</label>
                    <input type="text" name="stat_experience" class="form-control"
                           value="{{ old('stat_experience', $settings->stat_experience) }}"
                           placeholder="Ex : 10+">
                </div>
            </div>
        </div>
    </div>

    {{-- =========================================================
         BARRE D'ACTION SUBMIT
    ========================================================== --}}
    <div class="d-flex flex-column flex-sm-row justify-content-end gap-3 mb-5">
        <a href="{{ route('admin.dashboard') }}" class="adm-btn adm-btn-outline adm-btn-responsive">
            <i class="fa-solid fa-xmark"></i> Annuler
        </a>
        <button type="submit" class="adm-btn adm-btn-primary adm-btn-responsive" style="padding:12px 28px;font-size:14px;">
            <i class="fa-solid fa-floppy-disk"></i> Enregistrer les paramètres
        </button>
    </div>

</form>

@endsection