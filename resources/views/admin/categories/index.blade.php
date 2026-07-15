@extends('layouts.admin')

@section('title', 'Catégories')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Gestion des catégories
            </h2>

            <p class="text-muted mb-0">
                Gérez les catégories des biens et des services.
            </p>

        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-plus me-2"></i>

            Nouvelle catégorie

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Nom</th>

                        <th>Icône</th>

                        <th>Description</th>

                        <th width="180">Actions</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($categories as $category)

                    <tr>

                        <td>

                            {{ $category->id }}

                        </td>

                        <td>

                            <strong>{{ $category->name }}</strong>

                        </td>

                        <td>

                            @if($category->icon)

                                <i class="fa-solid {{ $category->icon }}"></i>

                                <span class="ms-2">{{ $category->icon }}</span>

                            @else

                                -

                            @endif

                        </td>

                        <td>

                            {{ $category->description ?? '-' }}

                        </td>

                        <td>

                            <a href="{{ route('admin.categories.edit',$category) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form action="{{ route('admin.categories.destroy',$category) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button
                                    onclick="return confirm('Supprimer cette catégorie ?')"
                                    class="btn btn-danger btn-sm">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-4">

                            Aucune catégorie enregistrée.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $categories->links() }}

            </div>

        </div>

    </div>

</div>

@endsection