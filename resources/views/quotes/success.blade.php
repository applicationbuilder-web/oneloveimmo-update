@extends('layouts.app')

@section('title', 'Demande de devis transmise avec succès — OneLove Immo')

@section('content')

@php
    $whatsappUrl = $settings?->getEffectiveWhatsappUrl("Bonjour OneLove Immo, je viens de soumettre une demande de devis sur votre site internet et j'aimerais échanger avec un conseiller.") 
        ?? 'https://wa.me/242060000000?text=' . urlencode("Bonjour OneLove Immo, je viens de soumettre une demande de devis.");
@endphp

<section class="py-5" style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); min-height: 75vh; display: flex; align-items: center;">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 text-center bg-white">

                    {{-- Coche verte avec animation --}}
                    <div class="mx-auto mb-4" style="width: 85px; height: 85px; border-radius: 50%; background: #dcfce7; color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 38px; box-shadow: 0 10px 25px rgba(22, 163, 74, 0.25);">
                        <i class="fa-solid fa-check"></i>
                    </div>

                    <span class="badge px-3 py-2 text-uppercase mb-2 d-inline-block mx-auto" style="background: #eff6ff; color: #0F4C81; font-weight: 700;">
                        <i class="fa-solid fa-circle-check me-1"></i> Réception confirmée
                    </span>

                    <h2 class="display-6 fw-bold mb-3" style="color: #0d1b2a;">
                        Merci ! Votre Demande De Devis A Été Transmise
                    </h2>

                    <p class="text-muted mb-4 mx-auto" style="max-width: 540px; line-height: 1.7; font-size: 16px;">
                        Notre bureau d'études et nos ingénieurs prennent connaissance de vos besoins. Un conseiller dédié vous contactera sous <strong>24 à 48 heures ouvrées</strong> pour affiner votre chiffrage.
                    </p>

                    {{-- Prochaines étapes --}}
                    <div class="p-4 rounded-4 mb-4 text-start" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <h6 class="fw-bold text-dark mb-3 text-uppercase small" style="letter-spacing: 0.5px;">
                            <i class="fa-solid fa-list-ol text-primary me-2"></i> Que se passe-t-il maintenant ?
                        </h6>

                        <div class="d-flex align-items-start mb-3">
                            <span class="badge rounded-circle bg-primary me-3 mt-1" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">1</span>
                            <div>
                                <strong class="d-block text-dark small">Analyse technique préalable</strong>
                                <span class="text-muted small">Examen des contraintes de localisation, type d'ouvrage et matériaux.</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <span class="badge rounded-circle bg-primary me-3 mt-1" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">2</span>
                            <div>
                                <strong class="d-block text-dark small">Élaboration de la proposition financière</strong>
                                <span class="text-muted small">Chiffrage précis poste par poste adapté à votre enveloppe budgétaire.</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start">
                            <span class="badge rounded-circle bg-success me-3 mt-1" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">3</span>
                            <div>
                                <strong class="d-block text-dark small">Échange personnalisé & Visite terrain</strong>
                                <span class="text-muted small">Appel direct de notre conducteur de travaux ou prise de RDV sur site.</span>
                            </div>
                        </div>
                    </div>

                    {{-- Boutons d'action --}}
                    <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold px-4 py-3 shadow-sm d-inline-flex align-items-center gap-2" style="background: #25D366; border-radius: 10px;">
                            <i class="fa-brands fa-whatsapp fs-5"></i>
                            <span>Suivre mon dossier sur WhatsApp</span>
                        </a>

                        <a href="{{ route('construction.index') }}" class="btn btn-outline-primary fw-semibold px-4 py-3" style="border-radius: 10px;">
                            <i class="fa-solid fa-person-digging me-2"></i> Voir nos réalisations
                        </a>

                        <a href="{{ route('home') }}" class="btn btn-light border fw-semibold px-4 py-3" style="border-radius: 10px;">
                            Retour à l'accueil
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection