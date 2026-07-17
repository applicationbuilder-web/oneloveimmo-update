@extends('layouts.admin')

@section('title', 'Détail du message')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Détail du message
            </h2>

            <p class="text-muted mb-0">
                Message envoyé depuis le formulaire de contact.
            </p>

        </div>

        <a href="{{ route('admin.contacts.index') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-2"></i>

            Retour

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body p-4">

            <div class="row mb-4">

                <div class="col-md-6">

                    <h6 class="text-muted">
                        Nom
                    </h6>

                    <p class="fw-semibold">
                        {{ $contact->name }}
                    </p>

                </div>

                <div class="col-md-6">

                    <h6 class="text-muted">
                        Email
                    </h6>

                    <p>
                        {{ $contact->email }}
                    </p>

                </div>

            </div>

            <div class="row mb-4">

                <div class="col-md-6">

                    <h6 class="text-muted">
                        Téléphone
                    </h6>

                    <p>
                        {{ $contact->phone ?: 'Non renseigné' }}
                    </p>

                </div>

                <div class="col-md-6">

                    <h6 class="text-muted">
                        Date
                    </h6>

                    <p>
                        {{ $contact->created_at->format('d/m/Y à H:i') }}
                    </p>

                </div>

            </div>

            <div class="mb-4">

                <h6 class="text-muted">
                    Sujet
                </h6>

                <p class="fw-semibold">
                    {{ $contact->subject }}
                </p>

            </div>

            <div>

                <h6 class="text-muted">
                    Message
                </h6>

                <div class="border rounded p-3 bg-light">

                    {!! nl2br(e($contact->message)) !!}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection