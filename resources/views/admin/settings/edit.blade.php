@extends('layouts.admin')

@section('title', 'Paramètres du site')

@section('content')

<div class="container-fluid py-4">

    {{-- =========================================================
         TITRE
    ========================================================== --}}

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Paramètres du site
        </h2>

        <p class="text-muted mb-0">
            Gérez les images, coordonnées et réseaux sociaux de OneLove Immo.
        </p>

    </div>


    {{-- =========================================================
         MESSAGE SUCCÈS
    ========================================================== --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =========================================================
         ERREURS
    ========================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Erreur :</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.settings.update') }}"
        enctype="multipart/form-data">

        @csrf

        @method('PUT')


        {{-- =====================================================
             IMAGES
        ====================================================== --}}

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-4">

                <h5 class="fw-bold mb-1">

                    <i class="fa-solid fa-images me-2 text-primary"></i>

                    Images du site

                </h5>

                <p class="text-muted mb-0">

                    Modifiez les images utilisées sur les différentes pages.

                </p>

            </div>


            <div class="card-body">

                <div class="row g-4">


                    {{-- HERO --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-bold">
                            Image Hero — Accueil
                        </label>

                        @if($settings->hero_image)

                            <img
                                src="{{ asset('storage/'.$settings->hero_image) }}"
                                class="img-fluid rounded mb-3"
                                style="width:100%; height:220px; object-fit:cover;">

                        @else

                            <div class="alert alert-light">
                                Aucune image configurée.
                            </div>

                        @endif

                        <input
                            type="file"
                            name="hero_image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                    </div>


                    {{-- CONSTRUCTION --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-bold">
                            Image Construction
                        </label>

                        @if($settings->construction_image)

                            <img
                                src="{{ asset('storage/'.$settings->construction_image) }}"
                                class="img-fluid rounded mb-3"
                                style="width:100%; height:220px; object-fit:cover;">

                        @else

                            <div class="alert alert-light">
                                Aucune image configurée.
                            </div>

                        @endif

                        <input
                            type="file"
                            name="construction_image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                    </div>


                    {{-- ABOUT --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-bold">
                            Image À propos
                        </label>

                        @if($settings->about_image)

                            <img
                                src="{{ asset('storage/'.$settings->about_image) }}"
                                class="img-fluid rounded mb-3"
                                style="width:100%; height:220px; object-fit:cover;">

                        @else

                            <div class="alert alert-light">
                                Aucune image configurée.
                            </div>

                        @endif

                        <input
                            type="file"
                            name="about_image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                    </div>


                    {{-- PROJET 1 --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-bold">
                            Image Projet 1
                        </label>

                        @if($settings->project_image_1)

                            <img
                                src="{{ asset('storage/'.$settings->project_image_1) }}"
                                class="img-fluid rounded mb-3"
                                style="width:100%; height:220px; object-fit:cover;">

                        @endif

                        <input
                            type="file"
                            name="project_image_1"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                    </div>


                    {{-- PROJET 2 --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-bold">
                            Image Projet 2
                        </label>

                        @if($settings->project_image_2)

                            <img
                                src="{{ asset('storage/'.$settings->project_image_2) }}"
                                class="img-fluid rounded mb-3"
                                style="width:100%; height:220px; object-fit:cover;">

                        @endif

                        <input
                            type="file"
                            name="project_image_2"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                    </div>


                    {{-- PROJET 3 --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-bold">
                            Image Projet 3
                        </label>

                        @if($settings->project_image_3)

                            <img
                                src="{{ asset('storage/'.$settings->project_image_3) }}"
                                class="img-fluid rounded mb-3"
                                style="width:100%; height:220px; object-fit:cover;">

                        @endif

                        <input
                            type="file"
                            name="project_image_3"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             CONTACT
        ====================================================== --}}

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-4">

                <h5 class="fw-bold mb-1">

                    <i class="fa-solid fa-address-book me-2 text-warning"></i>

                    Informations de contact

                </h5>

                <p class="text-muted mb-0">
                    Ces informations seront affichées dans le footer et les pages du site.
                </p>

            </div>


            <div class="card-body">

                <div class="row g-4">


                    <div class="col-md-4">

                        <label class="form-label fw-bold">
                            Adresse
                        </label>

                        <input
                            type="text"
                            name="contact_address"
                            class="form-control"
                            value="{{ old('contact_address', $settings->contact_address) }}"
                            placeholder="Brazzaville, Congo">

                    </div>


                    <div class="col-md-4">

                        <label class="form-label fw-bold">
                            Téléphone
                        </label>

                        <input
                            type="text"
                            name="contact_phone"
                            class="form-control"
                            value="{{ old('contact_phone', $settings->contact_phone) }}"
                            placeholder="+242 XX XXX XX XX">

                    </div>


                    <div class="col-md-4">

                        <label class="form-label fw-bold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="contact_email"
                            class="form-control"
                            value="{{ old('contact_email', $settings->contact_email) }}"
                            placeholder="contact@oneloveimmo.com">

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             RÉSEAUX SOCIAUX
        ====================================================== --}}

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-4">

                <h5 class="fw-bold mb-1">

                    <i class="fa-solid fa-share-nodes me-2 text-primary"></i>

                    Réseaux sociaux

                </h5>

            </div>


            <div class="card-body">

                <div class="row g-4">


                    <div class="col-md-6">

                        <label class="form-label fw-bold">
                            Facebook
                        </label>

                        <input
                            type="url"
                            name="facebook_url"
                            class="form-control"
                            value="{{ old('facebook_url', $settings->facebook_url) }}"
                            placeholder="https://facebook.com/...">

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-bold">
                            Instagram
                        </label>

                        <input
                            type="url"
                            name="instagram_url"
                            class="form-control"
                            value="{{ old('instagram_url', $settings->instagram_url) }}"
                            placeholder="https://instagram.com/...">

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-bold">
                            LinkedIn
                        </label>

                        <input
                            type="url"
                            name="linkedin_url"
                            class="form-control"
                            value="{{ old('linkedin_url', $settings->linkedin_url) }}"
                            placeholder="https://linkedin.com/...">

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-bold">
                            WhatsApp
                        </label>

                        <input
                            type="url"
                            name="whatsapp_url"
                            class="form-control"
                            value="{{ old('whatsapp_url', $settings->whatsapp_url) }}"
                            placeholder="https://wa.me/...">

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             BOUTON ENREGISTRER
        ====================================================== --}}

        <div class="text-end mb-5">

            <button
                type="submit"
                class="btn btn-primary btn-lg px-5">

                <i class="fa-solid fa-floppy-disk me-2"></i>

                Enregistrer les paramètres

            </button>

        </div>

    </form>

</div>

@endsection