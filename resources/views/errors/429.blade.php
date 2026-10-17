@extends('layouts.app')

@section('title', 'Trop de requêtes (429)')

@section('content')
<section class="py-5 d-flex align-items-center" style="min-height: 70vh;">
    <div class="container text-center py-5">
        <div class="mb-4">
            <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 100px; height: 100px; background: rgba(249, 115, 22, 0.1); color: #f97316; font-size: 42px;">
                <i class="fa-solid fa-hourglass-half"></i>
            </span>
        </div>
        <span class="badge px-3 py-2 text-uppercase mb-3" style="background: rgba(249, 115, 22, 0.15); color: #ea580c; font-weight: 600; letter-spacing: 1px;">
            Erreur 429 — Trop de requêtes
        </span>
        <h1 class="fw-bold display-5 mb-3" style="color: #0d1b2a;">
            Ralentissez un instant
        </h1>
        <p class="text-muted mx-auto mb-4" style="max-width: 580px; font-size: 17px;">
            Vous avez effectué trop de requêtes consécutives dans un court intervalle de temps. Veuillez patienter une minute avant de réessayer.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Retour à l'accueil
            </a>
        </div>
    </div>
</section>
@endsection
