@extends('layouts.app')

@section('title', 'Demander un devis gratuit — OneLove Immo')

@section('content')

@php
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl("Bonjour OneLove Immo, je souhaite obtenir un devis pour mon projet immobilier / construction.") 
        ?? 'https://wa.me/242060000000?text=' . urlencode("Bonjour OneLove Immo, je souhaite obtenir un devis.");

    $waRawNumber = $settings?->whatsapp_url ?: $settings?->contact_phone;
    $waClean = preg_replace('/[^0-9]/', '', (string)$waRawNumber);
    if (!empty($waClean)) {
        if (str_starts_with($waClean, '0') && strlen($waClean) === 9) {
            $waClean = '242' . substr($waClean, 1);
        } elseif (!str_starts_with($waClean, '242') && strlen($waClean) <= 9) {
            $waClean = '242' . $waClean;
        }
    } else {
        $waClean = '242060000000';
    }
@endphp

{{-- =========================================================
     1. HERO HEADER DE LA DEMANDE DE DEVIS
========================================================== --}}
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 60%, #0F4C81 100%); color: #ffffff;">
    <div style="position:absolute; top:-100px; right:-100px; width:450px; height:450px; background:radial-gradient(circle, rgba(249,115,22,0.2) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-120px; left:-120px; width:450px; height:450px; background:radial-gradient(circle, rgba(20,120,255,0.18) 0%, rgba(0,0,0,0) 70%); border-radius:50%; pointer-events:none;"></div>

    <div class="container py-4 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-9 mx-auto text-center">
                <nav aria-label="breadcrumb" class="mb-3 d-inline-block">
                    <ol class="breadcrumb justify-content-center px-3 py-1 rounded-pill" style="background: rgba(255,255,255,0.08); font-size: 13px;">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Demander un devis</li>
                    </ol>
                </nav>

                <span class="badge px-3 py-2 text-uppercase mb-3 d-inline-block shadow-sm" style="background: rgba(249, 115, 22, 0.2); color: #F97316; border: 1px solid rgba(249, 115, 22, 0.4); font-weight: 700; letter-spacing: 1px;">
                    <i class="fa-solid fa-calculator me-1"></i> Étude & Chiffrage Gratuit
                </span>

                <h1 class="display-4 fw-bold mb-3" style="letter-spacing: -0.5px;">
                    Donnons Vie À Votre Projet — <span style="background: linear-gradient(135deg, #F97316, #ffbf00); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Devis Gratuit Sous 48h</span>
                </h1>

                <p class="lead text-white-50 mb-4" style="line-height: 1.8; font-size: 18px;">
                    Construction de villa, plans d'architecte 3D, rénovation ou acquisition immobilière : nos experts analysent vos besoins et vous transmettent un chiffrage clair et détaillé.
                </p>

                {{-- Badges de réassurance --}}
                <div class="d-flex justify-content-center gap-4 flex-wrap text-white-50 small">
                    <span><i class="fa-solid fa-circle-check text-warning me-1"></i> Gratuit & Sans engagement</span>
                    <span><i class="fa-solid fa-clock text-warning me-1"></i> Réponse sous 48h ouvrées</span>
                    <span><i class="fa-solid fa-shield-halved text-warning me-1"></i> Confidentialité garantie</span>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
     2. CONTENU DU FORMULAIRE ET SIDEBAR
========================================================== --}}
<section class="py-5" style="background: #f8fafc;">
    <div class="container py-lg-4">

        @if($errors->any())
            <div class="alert alert-danger shadow-sm border-0 mb-4 rounded-4" role="alert">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-triangle-exclamation fs-5 me-2 text-danger"></i>
                    <strong>Veuillez vérifier les champs du formulaire :</strong>
                </div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-5">

            <!-- Colonne Principale (Gauche - Formulaire) -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5" style="background: #ffffff;">

                    <div class="mb-4 pb-3 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div>
                            <h3 class="fw-bold mb-1" style="color:#0d1b2a;">
                                Remplissez votre demande de devis
                            </h3>
                            <p class="text-muted small mb-0">
                                Prenez 2 minutes pour nous décrire votre vision. Plus les détails sont précis, plus notre estimation sera juste.
                            </p>
                        </div>
                        <span class="badge bg-light text-primary border px-3 py-2 rounded-pill small">
                            <i class="fa-solid fa-file-invoice me-1"></i> Formulaire officiel
                        </span>
                    </div>

                    <form action="{{ route('quotes.store') }}" method="POST" enctype="multipart/form-data" id="quoteForm">
                        @csrf

                        {{-- SECTION 1 : Coordonnées du contact --}}
                        <div class="mb-5">
                            <h5 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                                <span style="width: 28px; height: 28px; border-radius: 50%; background: #0F4C81; color:#fff; display:inline-flex; align-items:center; justify-content:center; font-size:13px;">1</span>
                                Vos Coordonnées
                            </h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">
                                        Nom complet <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="fullname"
                                        id="quote_fullname"
                                        value="{{ old('fullname') }}"
                                        required
                                        class="form-control form-control-lg @error('fullname') is-invalid @enderror"
                                        placeholder="Ex : Guy Brice Ngoma"
                                        style="border-radius: 10px; font-size: 15px;">
                                    @error('fullname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">
                                        Téléphone (WhatsApp de préférence) <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="tel"
                                        name="phone"
                                        id="quote_phone"
                                        value="{{ old('phone') }}"
                                        required
                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                        placeholder="Ex : +242 06 123 45 67"
                                        style="border-radius: 10px; font-size: 15px;">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">
                                        Adresse Email
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="quote_email"
                                        value="{{ old('email') }}"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="ngoma.brice@gmail.com"
                                        style="border-radius: 10px; font-size: 15px;">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">
                                        Ville du projet <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="city"
                                        id="quote_city"
                                        value="{{ old('city', 'Brazzaville') }}"
                                        required
                                        class="form-control form-control-lg @error('city') is-invalid @enderror"
                                        placeholder="Brazzaville, Pointe-Noire, Kintélé..."
                                        style="border-radius: 10px; font-size: 15px;">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- SECTION 2 : Typologie du projet & Budget --}}
                        <div class="mb-5">
                            <h5 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                                <span style="width: 28px; height: 28px; border-radius: 50%; background: #0F4C81; color:#fff; display:inline-flex; align-items:center; justify-content:center; font-size:13px;">2</span>
                                Nature du Projet & Budget
                            </h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">
                                        Type de prestation souhaitée <span class="text-danger">*</span>
                                    </label>
                                    <select
                                        name="project_type"
                                        id="quote_project_type"
                                        class="form-select form-select-lg @error('project_type') is-invalid @enderror"
                                        required
                                        style="border-radius: 10px; font-size: 15px;">
                                        <option value="">-- Sélectionnez un type de projet --</option>
                                        <option value="Construction de villa / maison" {{ old('project_type') == 'Construction de villa / maison' ? 'selected' : '' }}>🏗️ Construction de villa / maison</option>
                                        <option value="Construction d'immeuble R+" {{ old('project_type') == "Construction d'immeuble R+" ? 'selected' : '' }}>🏢 Construction d'immeuble R+</option>
                                        <option value="Architecture & Plans 3D" {{ old('project_type') == 'Architecture & Plans 3D' ? 'selected' : '' }}>📐 Architecture & Plans 3D</option>
                                        <option value="Rénovation & Second-Œuvre" {{ old('project_type') == 'Rénovation & Second-Œuvre' ? 'selected' : '' }}>🛠️ Rénovation & Second-Œuvre</option>
                                        <option value="Achat de bien immobilier" {{ old('project_type') == 'Achat de bien immobilier' ? 'selected' : '' }}>🏡 Achat de bien immobilier</option>
                                        <option value="Achat de terrain / parcelle" {{ old('project_type') == 'Achat de terrain / parcelle' ? 'selected' : '' }}>🗺️ Achat de terrain / parcelle</option>
                                        <option value="Location / Gestion locative" {{ old('project_type') == 'Location / Gestion locative' ? 'selected' : '' }}>🔑 Location / Gestion locative</option>
                                        <option value="Autre prestation" {{ old('project_type') == 'Autre prestation' ? 'selected' : '' }}>📋 Autre prestation</option>
                                    </select>
                                    @error('project_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">
                                        Budget estimé (FCFA)
                                    </label>
                                    <div class="input-group">
                                        <input
                                            type="number"
                                            name="budget"
                                            id="quote_budget"
                                            value="{{ old('budget') }}"
                                            min="0"
                                            class="form-control form-control-lg @error('budget') is-invalid @enderror"
                                            placeholder="Ex : 25000000"
                                            style="border-radius: 10px 0 0 10px; font-size: 15px;">
                                        <span class="input-group-text bg-light fw-bold" style="border-radius: 0 10px 10px 0;">FCFA</span>
                                    </div>
                                    <div class="form-text text-muted" style="font-size: 11px;">
                                        Facultatif mais utile pour adapter les propositions techniques à vos capacités financières.
                                    </div>
                                    @error('budget')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- SECTION 3 : Cahier des charges & Pièce jointe --}}
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                                <span style="width: 28px; height: 28px; border-radius: 50%; background: #0F4C81; color:#fff; display:inline-flex; align-items:center; justify-content:center; font-size:13px;">3</span>
                                Cahier des Charges & Documents
                            </h5>

                            <div class="mb-4">
                                <label class="form-label small fw-semibold text-dark">
                                    Décrivez votre projet avec le maximum de détails <span class="text-danger">*</span>
                                </label>
                                <textarea
                                    name="message"
                                    id="quote_message"
                                    rows="6"
                                    required
                                    class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Indiquez par exemple : superficie souhaitée, nombre de chambres/salons, localisation de votre terrain (s'il est déjà acquis), exigences particulières, délais envisagés..."
                                    style="border-radius: 10px; line-height: 1.6;">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Dépôt de pièce jointe stylé --}}
                            <div>
                                <label class="form-label small fw-semibold text-dark">
                                    Plan, croquis ou document existant (Optionnel)
                                </label>
                                <div class="p-3 border rounded-3 bg-light text-center" style="border-style: dashed !important; border-width: 2px !important; border-color: #cbd5e1 !important;">
                                    <i class="fa-solid fa-cloud-arrow-up text-primary fs-3 mb-2 d-block"></i>
                                    <span class="text-muted small d-block mb-2">Formats acceptés : PDF, JPG, PNG (Max 5 Mo)</span>
                                    <input
                                        type="file"
                                        name="attachment"
                                        id="quote_attachment"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        class="form-control form-control-sm mx-auto"
                                        style="max-width: 320px;">
                                </div>
                                @error('attachment')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Boutons d'action --}}
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 pt-4 border-top">
                            <button
                                type="submit"
                                class="btn btn-warning px-4 py-3 fw-bold shadow-sm d-inline-flex align-items-center gap-2 text-dark"
                                style="border-radius: 10px; font-size: 15px;">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Envoyer la demande de devis</span>
                            </button>

                            <button
                                type="button"
                                id="sendQuoteViaWhatsappBtn"
                                class="btn px-4 py-3 text-white fw-bold shadow-sm d-inline-flex align-items-center gap-2"
                                style="background: #25D366; border-radius: 10px; font-size: 15px;"
                                title="Transmettre ce devis directement à notre ingénieur sur WhatsApp">
                                <i class="fa-brands fa-whatsapp fs-5"></i>
                                <span>Transmettre via WhatsApp</span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <!-- Colonne Latérale (Droite - Réassurance & Contact direct) -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 90px; z-index: 10;">

                    {{-- CARTE WHATSAPP RAPIDE --}}
                    <div class="card border-0 shadow-sm mb-4 text-white rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #075E54 0%, #128C7E 100%);">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div style="width: 48px; height: 48px; border-radius: 50%; background: #25D366; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #fff; box-shadow: 0 4px 12px rgba(37,211,102,0.4);">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-white">Besoin d'un chiffrage urgent ?</h5>
                                    <span class="small text-white-50">Assistance en direct</span>
                                </div>
                            </div>

                            <p class="small text-white-50 mb-3" style="line-height: 1.5;">
                                Vous pouvez envoyer vos croquis, photos ou questions directement par WhatsApp pour une pré-estimation immédiate.
                            </p>

                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-light w-100 fw-bold py-2 shadow-sm d-flex align-items-center justify-content-center gap-2" style="color: #075E54; border-radius: 10px;">
                                <i class="fa-brands fa-whatsapp fs-5" style="color: #25D366;"></i>
                                Discuter sur WhatsApp
                            </a>

                            @if($settings?->contact_phone)
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}" class="btn btn-outline-light w-100 fw-semibold py-2 mt-2 d-flex align-items-center justify-content-center gap-2" style="border-radius: 10px; font-size: 14px;">
                                    <i class="fa-solid fa-phone"></i>
                                    Appeler le service devis
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- CARTE LES GARANTIES ONELOVE IMMO --}}
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #ffffff;">
                        <h5 class="fw-bold text-dark mb-3">
                            <i class="fa-solid fa-medal text-warning me-2"></i> Nos Engagements Devis
                        </h5>

                        <ul class="list-unstyled mb-0" style="font-size: 14px;">
                            <li class="d-flex align-items-start mb-3">
                                <i class="fa-solid fa-check-double text-success me-2 mt-1"></i>
                                <div>
                                    <strong class="d-block text-dark">Chiffrage Transparent</strong>
                                    <span class="text-muted small">Détail des fournitures, gros-œuvre et main-d'œuvre sans coût caché.</span>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <i class="fa-solid fa-check-double text-success me-2 mt-1"></i>
                                <div>
                                    <strong class="d-block text-dark">Conseil d'Architecte Inclus</strong>
                                    <span class="text-muted small">Nos experts optimisent vos plans pour maximiser l'espace et réduire les coûts.</span>
                                </div>
                            </li>

                            <li class="d-flex align-items-start">
                                <i class="fa-solid fa-check-double text-success me-2 mt-1"></i>
                                <div>
                                    <strong class="d-block text-dark">Garantie Décennale</strong>
                                    <span class="text-muted small">Tous nos ouvrages en béton armé sont protégés par une garantie de conformité.</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- STATS RAPIDES --}}
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-center" style="background: #eff6ff; border: 1px solid #bfdbfe !important;">
                        <span class="text-muted small text-uppercase fw-bold d-block mb-1">Nos Chiffres Clés</span>
                        <h3 class="fw-bold mb-1" style="color: #0F4C81;">
                            {{ $settings?->getEffectiveProjectsCount() ?? \App\Models\Construction::count() }}+ Projets Réalisés
                        </h3>
                        <p class="text-muted small mb-0">
                            Faites confiance à l'expertise éprouvée de OneLove Immo au Congo.
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const waBtn = document.getElementById('sendQuoteViaWhatsappBtn');
        const waNumber = "{{ $waClean }}";

        if (waBtn) {
            waBtn.addEventListener('click', function() {
                const fullname = document.getElementById('quote_fullname').value.trim();
                const phone = document.getElementById('quote_phone').value.trim();
                const email = document.getElementById('quote_email').value.trim();
                const city = document.getElementById('quote_city').value.trim();
                const projectType = document.getElementById('quote_project_type').value;
                const budget = document.getElementById('quote_budget').value.trim();
                const message = document.getElementById('quote_message').value.trim();

                let text = "📋 *DEMANDE DE DEVIS — ONELOVE IMMO*\n\n";
                if (fullname) text += "👤 *Nom :* " + fullname + "\n";
                if (phone) text += "📞 *Téléphone :* " + phone + "\n";
                if (email) text += "✉️ *Email :* " + email + "\n";
                if (city) text += "📍 *Ville du projet :* " + city + "\n";
                if (projectType) text += "🏗️ *Type de projet :* " + projectType + "\n";
                if (budget) text += "💰 *Budget estimé :* " + parseInt(budget).toLocaleString('fr-FR') + " FCFA\n";
                if (message) text += "\n📝 *Détails du projet :*\n" + message + "\n";

                const waUrl = "https://wa.me/" + waNumber + "?text=" + encodeURIComponent(text);
                window.open(waUrl, '_blank');
            });
        }
    });
</script>
@endpush

@endsection