@extends('layouts.admin')

@section('title', 'Gestion des biens')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h3 class="fw-bold mb-1">
                        Liste des biens immobiliers
                    </h3>

                    <p class="text-muted mb-0">
                        Gérez tous les biens enregistrés sur OneLove Immo.
                    </p>

                </div>

                <a href="{{ route('admin.properties.create') }}"
                   class="btn btn-success">

                    <i class="fa-solid fa-plus me-2"></i>

                    Ajouter un bien

                </a>

            </div>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Image</th>

                            <th>Titre</th>

                            <th>Catégorie</th>

                            <th>Ville</th>

                            <th>Prix</th>

                            <th>Statut</th>

                            <th class="text-center" width="170">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($properties as $property)

                            <tr>

                                <td>

                                    <strong>{{ $property->id }}</strong>

                                </td>

                                <td>

                                    @php

                                        $image = $property->image
                                            ? asset('storage/'.$property->image)
                                            : asset('assets/images/no-image.jpg');

                                    @endphp

                                    <img
                                        src="{{ $image }}"
                                        alt="{{ $property->title }}"
                                        width="100"
                                        height="70"
                                        class="rounded shadow-sm"
                                        style="object-fit:cover;">

                                </td>

                                <td>

                                    <strong>

                                        {{ $property->title }}

                                    </strong>

                                    @if($property->featured)

                                        <br>

                                        <span class="badge bg-primary mt-1">

                                            ⭐ Vedette

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($property->category)

                                        <span class="badge bg-secondary">

                                            {{ $property->category->name }}

                                        </span>

                                    @else

                                        <span class="text-muted">

                                            Aucune

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <i class="fa-solid fa-location-dot text-danger me-1"></i>

                                    {{ $property->city }}

                                </td>

                                <td>

                                    <strong>

                                        {{ number_format($property->price,0,',',' ') }}

                                    </strong>

                                    FCFA

                                </td>

                                <td>

                                    @if($property->status == 'a_vendre')

                                        <span class="badge bg-success">

                                            À vendre

                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">

                                            À louer

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        <a
                                            href="{{ route('admin.properties.show',$property) }}"
                                            class="btn btn-outline-primary btn-sm rounded-circle action-btn"
                                            title="Voir">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                        <a
                                            href="{{ route('admin.properties.edit',$property) }}"
                                            class="btn btn-outline-warning btn-sm rounded-circle action-btn"
                                            title="Modifier">

                                            <i class="fa-solid fa-pen"></i>

                                        </a>

                                        <form
                                            action="{{ route('admin.properties.destroy',$property) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="btn btn-outline-danger btn-sm rounded-circle action-btn"
                                                onclick="return confirm('Voulez-vous vraiment supprimer ce bien ?')">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8">

                                    <div class="text-center py-5">

                                        <i class="fa-solid fa-house-circle-xmark fa-4x text-secondary mb-3"></i>

                                        <h5>

                                            Aucun bien immobilier enregistré.

                                        </h5>

                                        <p class="text-muted">

                                            Cliquez sur <strong>Ajouter un bien</strong> pour commencer.

                                        </p>

                                        <a href="{{ route('admin.properties.create') }}"
                                           class="btn btn-success mt-2">

                                            <i class="fa-solid fa-plus me-2"></i>

                                            Ajouter un bien

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            @if($properties->hasPages())

                <div class="d-flex justify-content-center mt-4">

                    {{ $properties->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection