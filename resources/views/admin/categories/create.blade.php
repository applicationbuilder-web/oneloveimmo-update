@extends('layouts.admin')

@section('title', 'Nouvelle catégorie')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Nouvelle catégorie
            </h2>

            <p class="text-muted mb-0">
                Ajoutez une nouvelle catégorie de biens ou de services.
            </p>

        </div>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-2"></i>

            Retour

        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Nom de la catégorie

                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Ex : Villa">

                    @error('name')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Icône Font Awesome

                    </label>

                    <input
                        type="text"
                        name="icon"
                        value="{{ old('icon') }}"
                        class="form-control @error('icon') is-invalid @enderror"
                        placeholder="Ex : fa-house">

                    @error('icon')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                    <small class="text-muted">

                        Exemple :
                        fa-house,
                        fa-building,
                        fa-map,
                        fa-store...

                    </small>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Description

                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Description de la catégorie...">{{ old('description') }}</textarea>

                    @error('description')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="fa-solid fa-floppy-disk me-2"></i>

                    Enregistrer

                </button>

            </form>

        </div>

    </div>

</div>

@endsection