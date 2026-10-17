@extends('layouts.admin')

@section('title', 'Message de ' . $contact->name)
@section('page-title', 'Détail du message')
@section('page-subtitle', 'Reçu le ' . $contact->created_at->format('d/m/Y à H:i'))

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9 col-xl-8">

        {{-- Barre d'actions supérieure --}}
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-4 gap-3">
            <a href="{{ route('admin.contacts.index') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux messages
            </a>

            <div class="d-flex align-items-center flex-wrap gap-2">
                @php
                    $cPhone = preg_replace('/[^0-9]/', '', (string)$contact->phone);
                    if (!empty($cPhone)) {
                        if (str_starts_with($cPhone, '0') && strlen($cPhone) === 9) {
                            $cPhone = '242' . substr($cPhone, 1);
                        } elseif (!str_starts_with($cPhone, '242') && strlen($cPhone) <= 9) {
                            $cPhone = '242' . $cPhone;
                        }
                    }
                @endphp

                @if($contact->phone && !empty($cPhone))
                    <a href="https://wa.me/{{ $cPhone }}?text={{ urlencode('Bonjour ' . $contact->name . ', suite à votre message sur OneLove Immo concernant : ' . ($contact->subject ?: 'votre demande') . '...') }}" target="_blank" class="adm-btn text-white" style="background:#25D366;" title="Contacter sur WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                        WhatsApp
                    </a>
                @endif

                @if($contact->email)
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ rawurlencode($contact->subject) }}" class="adm-btn adm-btn-primary">
                        <i class="fa-solid fa-reply"></i>
                        Email
                    </a>
                @endif

                @if($contact->phone)
                    <a href="tel:{{ $contact->phone }}" class="adm-btn adm-btn-success">
                        <i class="fa-solid fa-phone"></i>
                        Appeler
                    </a>
                @endif

                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer définitivement ce message ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="adm-btn adm-btn-danger" title="Supprimer">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- Carte principale du message --}}
        <div class="adm-card">
            {{-- En-tête expéditeur --}}
            <div class="adm-card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div style="width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,#0F4C81,#1478ff);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:18px;">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="color:#0d1b2a;">{{ $contact->name }}</h5>
                        <div class="d-flex align-items-center gap-3 text-muted small mt-1">
                            @if($contact->email)
                                <span><i class="fa-solid fa-envelope me-1 text-primary"></i> {{ $contact->email }}</span>
                            @endif
                            @if($contact->phone)
                                <span><i class="fa-solid fa-phone me-1 text-success"></i> {{ $contact->phone }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    @if($contact->is_read)
                        <span class="adm-badge adm-badge-success">
                            <i class="fa-solid fa-check-double"></i> Lu
                        </span>
                    @else
                        <span class="adm-badge adm-badge-warning">
                            <i class="fa-solid fa-envelope"></i> Nouveau message
                        </span>
                    @endif
                </div>
            </div>

            {{-- Corps du message --}}
            <div class="adm-card-body p-4">
                {{-- Sujet --}}
                <div class="mb-4 pb-3 border-bottom">
                    <span class="text-uppercase small fw-bold text-muted d-block mb-1">Objet</span>
                    <h4 class="fw-bold mb-0" style="color:#1e293b;">
                        {{ $contact->subject ?: 'Sans objet' }}
                    </h4>
                </div>

                {{-- Contenu du message --}}
                <div class="mb-4">
                    <span class="text-uppercase small fw-bold text-muted d-block mb-2">Message</span>
                    <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;line-height:1.7;color:#334155;font-size:15px;white-space:pre-wrap;">{{ $contact->message }}</div>
                </div>

                {{-- Métadonnées --}}
                <div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
                    <div>
                        <i class="fa-regular fa-clock me-1"></i>
                        Envoyé le {{ $contact->created_at->format('d/m/Y à H:i') }} ({{ $contact->created_at->diffForHumans() }})
                    </div>
                    <div>
                        ID: #{{ $contact->id }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection