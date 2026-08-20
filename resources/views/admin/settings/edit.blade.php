@extends('layouts.admin')

@section('title', 'Paramètres du site')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">
            Paramètres du site
        </h2>

        <p class="text-muted">
            Gérez les informations et les éléments principaux de votre site OneLove Immo.
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">
            <h5 class="fw-bold mb-0">
                Informations générales
            </h5>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.settings.update') }}">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- Nom du site --}}
                    <div class="col-md-6">

                        <label for="site_name" class="form-label fw-semibold">
                            Nom du site
                        </label>

                        <input
                            type="text"
                            id="site_name"
                            name="site_name"
                            class="form-control"
                            value="{{ old('site_name', $settings->site_name ?? 'OneLove Immo') }}"
                            placeholder="OneLove Immo"
                        >

                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">

                        <label for="email" class="form-label fw-semibold">
                            Adresse email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $settings->email ?? '') }}"
                            placeholder="contact@oneloveimmo.com"
                        >

                    </div>

                    {{-- Téléphone --}}
                    <div class="col-md-6">

                        <label for="phone" class="form-label fw-semibold">
                            Téléphone
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone', $settings->phone ?? '') }}"
                            placeholder="+242 06 000 00 00"
                        >

                    </div>

                    {{-- Adresse --}}
                    <div class="col-md-6">

                        <label for="address" class="form-label fw-semibold">
                            Adresse
                        </label>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            class="form-control"
                            value="{{ old('address', $settings->address ?? '') }}"
                            placeholder="Brazzaville, Congo"
                        >

                    </div>

                    {{-- Description --}}
                    <div class="col-12">

                        <label for="description" class="form-label fw-semibold">
                            Description du site
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            class="form-control"
                            placeholder="Présentation de OneLove Immo..."
                        >{{ old('description', $settings->description ?? '') }}</textarea>

                    </div>

                </div>

                <div class="mt-4">

                    <button type="submit" class="btn btn-primary px-4">

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Enregistrer les modifications

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection