@extends('layouts.app')

@section('title', 'Accès Refusé (403)')

@section('content')
<section class="py-5 d-flex align-items-center" style="min-height: 70vh;">
    <div class="container text-center py-5">
        <div class="mb-4">
            <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 100px; height: 100px; background: rgba(239, 68, 68, 0.1); color: #ef4444; font-size: 42px;">
                <i class="fa-solid fa-shield-halved"></i>
            </span>
        </div>
        <span class="badge px-3 py-2 text-uppercase mb-3" style="background: rgba(239, 68, 68, 0.15); color: #dc2626; font-weight: 600; letter-spacing: 1px;">
            Erreur 403 — Accès Restreint
        </span>
        <h1 class="fw-bold display-5 mb-3" style="color: #0d1b2a;">
            Zone Réservée aux Administrateurs
        </h1>
        <p class="text-muted mx-auto mb-4" style="max-width: 580px; font-size: 17px;">
            {{ $exception->getMessage() ?: "Vous n'avez pas les autorisations nécessaires pour accéder à cette section de OneLove Immo." }}
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold">
                <i class="fa-solid fa-arrow-left me-1"></i> Retour à l'accueil
            </a>
            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm">
                <i class="fa-solid fa-right-to-bracket me-1"></i> Connexion administrateur
            </a>
        </div>
    </div>
</section>
@endsection
