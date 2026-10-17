@extends('layouts.app')

@section('title', 'Page Introuvable (404)')

@section('content')
<section class="py-5 d-flex align-items-center" style="min-height: 70vh;">
    <div class="container text-center py-5">
        <div class="mb-4">
            <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 100px; height: 100px; background: rgba(15, 76, 129, 0.1); color: var(--primary); font-size: 42px;">
                <i class="fa-solid fa-compass"></i>
            </span>
        </div>
        <span class="badge px-3 py-2 text-uppercase mb-3" style="background: rgba(15, 76, 129, 0.12); color: var(--primary); font-weight: 600; letter-spacing: 1px;">
            Erreur 404 — Page Non Trouvée
        </span>
        <h1 class="fw-bold display-5 mb-3" style="color: #0d1b2a;">
            Oups ! Cette page n'existe pas
        </h1>
        <p class="text-muted mx-auto mb-4" style="max-width: 580px; font-size: 17px;">
            La page que vous recherchez a peut-être été déplacée, renommée ou n'a jamais existé.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm">
                <i class="fa-solid fa-house me-1"></i> Retour à l'accueil
            </a>
            <a href="{{ route('properties.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold">
                <i class="fa-solid fa-building me-1"></i> Explorer nos biens
            </a>
        </div>
    </div>
</section>
@endsection
