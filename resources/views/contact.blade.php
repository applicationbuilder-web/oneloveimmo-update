@extends('layouts.app')

@section('title', 'Contact')

@section('content')

@php
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl("Bonjour OneLove Immo, je souhaite avoir des renseignements concernant vos biens et services.")
        ?? 'https://wa.me/242060000000?text=' . urlencode("Bonjour OneLove Immo, je souhaite avoir des renseignements.");
    
    // Numéro de WhatsApp nettoyé pour JS
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

<section class="py-5" style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">

    <div class="container">

        <div class="text-center mb-5">
            <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#e0f2fe; color:#0369a1; font-weight:600; letter-spacing:1px;">
                <i class="fa-solid fa-headset me-1"></i> À votre écoute
            </span>
            <h1 class="fw-bold display-6" style="color:#0d1b2a;">
                Contactez-nous
            </h1>
            <p class="text-muted mx-auto" style="max-width: 620px;">
                Vous avez un projet d'achat, de location, de construction ou une question ? Nos conseillers vous répondent rapidement.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center shadow-sm border-0 mb-4" role="alert">
                <i class="fa-solid fa-circle-check fs-4 me-3 text-success"></i>
                <div>
                    <strong>Message envoyé avec succès !</strong>
                    <div>{{ session('success') }}</div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger shadow-sm border-0 mb-4" role="alert">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-triangle-exclamation fs-5 me-2 text-danger"></i>
                    <strong>Veuillez corriger les champs suivants :</strong>
                </div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-5">

            <!-- Colonne de gauche : Coordonnées & Option WhatsApp -->
            <div class="col-lg-5">

                {{-- CARTE WHATSAPP EN VEDETTE --}}
                <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #075E54 0%, #128C7E 100%); border-radius: 16px; overflow: hidden; color: #ffffff;">
                    <div class="card-body p-4 position-relative">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 52px; height: 52px; border-radius: 50%; background: #25D366; display: flex; align-items: center; justify-content: center; font-size: 28px; color: #ffffff; box-shadow: 0 4px 14px rgba(37,211,102,0.4);">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-0 text-white">Contact WhatsApp</h4>
                                    <span class="badge bg-success bg-opacity-75 text-white small" style="font-size: 11px;">
                                        <i class="fa-solid fa-circle me-1" style="font-size: 8px;"></i> En ligne • Réponse rapide
                                    </span>
                                </div>
                            </div>
                        </div>

                        <p class="text-white-50 mb-3" style="font-size: 14px; line-height: 1.6;">
                            Besoin d'une réponse instantanée ? Échangez directement par message ou note vocale avec un agent OneLove Immo sur WhatsApp.
                        </p>

                        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-light w-100 fw-bold py-2 d-flex align-items-center justify-content-center gap-2 shadow-sm" style="color: #075E54; border-radius: 10px; font-size: 15px;">
                            <i class="fa-brands fa-whatsapp fs-5" style="color: #25D366;"></i>
                            Ouvrir la discussion WhatsApp
                        </a>
                    </div>
                </div>

                {{-- CARTE COORDONNÉES CLASSIQUES --}}
                <div class="card shadow-sm border-0" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4" style="color:#0d1b2a;">
                            Nos coordonnées
                        </h4>

                        {{-- Adresse / Localisation --}}
                        <div class="d-flex align-items-start mb-3 pb-3 border-bottom">
                            <div class="me-3 mt-1" style="width: 38px; height: 38px; border-radius: 10px; background: #fff7ed; display: flex; align-items: center; justify-content: center; color: #ea580c; flex-shrink: 0;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <strong class="d-block text-dark small text-uppercase fw-bold" style="letter-spacing: 0.5px;">Adresse & Siège</strong>
                                <span class="text-muted">{{ $settings?->contact_address ?: 'Brazzaville, République du Congo' }}</span>
                            </div>
                        </div>

                        {{-- Téléphone --}}
                        <div class="d-flex align-items-start mb-3 pb-3 border-bottom">
                            <div class="me-3 mt-1" style="width: 38px; height: 38px; border-radius: 10px; background: #eff6ff; display: flex; align-items: center; justify-content: center; color: #2563eb; flex-shrink: 0;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <strong class="d-block text-dark small text-uppercase fw-bold" style="letter-spacing: 0.5px;">Téléphone direct</strong>
                                @if($settings?->contact_phone)
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}" class="text-decoration-none fw-semibold" style="color: #0F4C81;">
                                        {{ $settings->contact_phone }}
                                    </a>
                                @else
                                    <span class="text-muted">+242 06 000 00 00</span>
                                @endif
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="d-flex align-items-start mb-3 pb-3 border-bottom">
                            <div class="me-3 mt-1" style="width: 38px; height: 38px; border-radius: 10px; background: #fdf2f8; display: flex; align-items: center; justify-content: center; color: #db2777; flex-shrink: 0;">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <strong class="d-block text-dark small text-uppercase fw-bold" style="letter-spacing: 0.5px;">Adresse Email</strong>
                                @if($settings?->contact_email)
                                    <a href="mailto:{{ $settings->contact_email }}" class="text-decoration-none fw-semibold" style="color: #0F4C81;">
                                        {{ $settings->contact_email }}
                                    </a>
                                @else
                                    <span class="text-muted">contact@oneloveimmo.com</span>
                                @endif
                            </div>
                        </div>

                        {{-- Horaires --}}
                        <div class="mb-4">
                            <h6 class="fw-bold mb-2 text-dark small text-uppercase" style="letter-spacing: 0.5px;">
                                <i class="fa-regular fa-clock me-1 text-primary"></i> Horaires d'ouverture
                            </h6>
                            <div class="d-flex justify-content-between text-muted small py-1">
                                <span>Lundi - Vendredi :</span>
                                <span class="fw-semibold text-dark">08h00 - 18h00</span>
                            </div>
                            <div class="d-flex justify-content-between text-muted small py-1">
                                <span>Samedi :</span>
                                <span class="fw-semibold text-dark">08h00 - 13h00</span>
                            </div>
                            <div class="d-flex justify-content-between text-muted small py-1">
                                <span>Dimanche :</span>
                                <span class="badge bg-light text-muted">Sur rendez-vous</span>
                            </div>
                        </div>

                        {{-- Réseaux sociaux --}}
                        @if($settings?->whatsapp_url || $settings?->facebook_url || $settings?->instagram_url || $settings?->linkedin_url)
                            <div class="pt-3 border-top">
                                <span class="d-block text-muted small mb-2 fw-semibold">Suivez-nous sur les réseaux :</span>
                                <div class="d-flex gap-2">
                                    @if($settings?->whatsapp_url || $settings?->contact_phone)
                                        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; background: #25D366;" title="WhatsApp">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    @endif
                                    @if($settings?->facebook_url)
                                        <a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="Facebook">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    @endif
                                    @if($settings?->instagram_url)
                                        <a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-danger rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="Instagram">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if($settings?->linkedin_url)
                                        <a href="{{ $settings->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="LinkedIn">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>

            <!-- Colonne de droite : Formulaire de contact -->
            <div class="col-lg-7">

                <div class="card shadow-sm border-0" style="border-radius: 16px;">

                    <div class="card-body p-4 p-md-5">

                        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                            <div>
                                <h3 class="fw-bold mb-1" style="color:#0d1b2a;">
                                    Envoyez-nous un message
                                </h3>
                                <p class="text-muted mb-0 small">
                                    Remplissez le formulaire ci-dessous ou basculez directement vers WhatsApp.
                                </p>
                            </div>

                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm fw-semibold d-inline-flex align-items-center gap-2 shadow-sm" style="background:#25D366; color:#fff; border-radius: 8px;">
                                <i class="fa-brands fa-whatsapp fs-6"></i>
                                <span>WhatsApp direct</span>
                            </a>
                        </div>

                        <form action="{{ route('contact.store') }}" method="POST" id="contactForm">

                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">
                                        Nom complet <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="contact_name"
                                        value="{{ old('name') }}"
                                        required
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        placeholder="Ex : Jean Moukassa"
                                        style="border-radius: 10px; font-size: 15px;">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">
                                        Numéro de téléphone <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="tel"
                                        name="phone"
                                        id="contact_phone"
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
                                    <label class="form-label fw-semibold text-dark small">
                                        Adresse email
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="contact_email"
                                        value="{{ old('email') }}"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="jean.moukassa@gmail.com"
                                        style="border-radius: 10px; font-size: 15px;">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">
                                        Objet / Sujet <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="subject"
                                        id="contact_subject"
                                        value="{{ old('subject') }}"
                                        required
                                        class="form-control form-control-lg @error('subject') is-invalid @enderror"
                                        placeholder="Ex : Achat terrain, Demande de devis..."
                                        style="border-radius: 10px; font-size: 15px;">
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold text-dark small">
                                        Votre message <span class="text-danger">*</span>
                                    </label>
                                    <textarea
                                        name="message"
                                        id="contact_message"
                                        rows="5"
                                        required
                                        class="form-control @error('message') is-invalid @enderror"
                                        placeholder="Décrivez votre besoin, votre projet ou votre question..."
                                        style="border-radius: 10px;">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            {{-- Boutons d'envoi --}}
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4 pt-3 border-top">
                                <button
                                    type="submit"
                                    class="btn px-4 py-2 text-white fw-bold d-inline-flex align-items-center gap-2 shadow-sm"
                                    style="background: #0F4C81; border-radius: 10px;">
                                    <i class="fa-solid fa-paper-plane"></i>
                                    <span>Envoyer le message</span>
                                </button>

                                <button
                                    type="button"
                                    id="sendViaWhatsappBtn"
                                    class="btn px-4 py-2 text-white fw-bold d-inline-flex align-items-center gap-2 shadow-sm"
                                    style="background: #25D366; border-radius: 10px;"
                                    title="Transmettre ce message directement sur WhatsApp">
                                    <i class="fa-brands fa-whatsapp fs-5"></i>
                                    <span>Transmettre via WhatsApp</span>
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- BOUTON FLOTTANT WHATSAPP MODERNE --}}
<div class="floating-wa-wrapper" style="position: fixed; bottom: 25px; right: 25px; z-index: 9999;">
    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="floating-wa-btn" title="Discuter sur WhatsApp avec OneLove Immo" aria-label="Discuter sur WhatsApp">
        <span class="floating-wa-tooltip d-none d-md-inline-block">
            Besoin d'aide ? <strong>Écrivez-nous sur WhatsApp</strong>
        </span>
        <div class="floating-wa-icon">
            <i class="fa-brands fa-whatsapp"></i>
        </div>
    </a>
</div>

<style>
    .floating-wa-btn {
        display: flex;
        align-items: center;
        text-decoration: none !important;
        position: relative;
    }
    .floating-wa-icon {
        width: 60px;
        height: 60px;
        background: #25D366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 32px;
        box-shadow: 0 8px 24px rgba(37, 211, 102, 0.45);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        animation: pulseWa 2.4s infinite;
    }
    .floating-wa-btn:hover .floating-wa-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 30px rgba(37, 211, 102, 0.6);
    }
    .floating-wa-tooltip {
        background: #ffffff;
        color: #1e293b;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 13px;
        margin-right: 12px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.12);
        white-space: nowrap;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    .floating-wa-tooltip strong {
        color: #075E54;
    }
    @keyframes pulseWa {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6);
        }
        70% {
            box-shadow: 0 0 0 16px rgba(37, 211, 102, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const waBtn = document.getElementById('sendViaWhatsappBtn');
        const waNumber = "{{ $waClean }}";

        if (waBtn) {
            waBtn.addEventListener('click', function() {
                const name = document.getElementById('contact_name').value.trim();
                const phone = document.getElementById('contact_phone').value.trim();
                const email = document.getElementById('contact_email').value.trim();
                const subject = document.getElementById('contact_subject').value.trim();
                const message = document.getElementById('contact_message').value.trim();

                let text = "Bonjour OneLove Immo, je vous contacte depuis votre site internet.\n\n";
                if (name) text += "👤 *Nom :* " + name + "\n";
                if (phone) text += "📞 *Téléphone :* " + phone + "\n";
                if (email) text += "✉️ *Email :* " + email + "\n";
                if (subject) text += "📌 *Objet :* " + subject + "\n";
                if (message) text += "\n💬 *Message :*\n" + message + "\n";

                const waUrl = "https://wa.me/" + waNumber + "?text=" + encodeURIComponent(text);
                window.open(waUrl, '_blank');
            });
        }
    });
</script>
@endpush

@endsection