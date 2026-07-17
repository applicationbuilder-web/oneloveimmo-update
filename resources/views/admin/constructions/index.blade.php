@extends('layouts.admin')

@section('title', 'Projets de construction')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                Projets de construction

            </h4>

            <a
                href="{{ route('admin.constructions.create') }}"
                class="btn btn-success">

                <i class="fa-solid fa-plus me-2"></i>

                Ajouter un projet

            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>Image</th>

                            <th>Nom</th>

                            <th>Ville</th>

                            <th>Statut</th>

                            <th>Date</th>

                            <th width="180">

                                Actions

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($constructions as $construction)

                        <tr>

                            <td>

                                {{ $construction->id }}

                            </td>

                            <td>

                                @if($construction->image)

                                    <img
                                        src="{{ asset('storage/'.$construction->image) }}"
                                        width="90"
                                        class="rounded shadow">

                                @else

                                    -

                                @endif

                            </td>

                            <td>

                                <strong>

                                    {{ $construction->title }}

                                </strong>

                            </td>

                            <td>

                                {{ $construction->city }}

                            </td>

                            <td>

                                <span class="badge bg-primary">

                                    {{ ucfirst($construction->status) }}

                                </span>

                            </td>

                            <td>

                                {{ $construction->created_at->format('d/m/Y') }}

                            </td>

                            <td>

                                <div class="d-flex gap-1">

                                    <a
                                        href="{{ route('admin.constructions.show',$construction) }}"
                                        class="btn btn-info btn-sm">

                                        <i class="fa-solid fa-eye"></i>

                                    </a>

                                    <a
                                        href="{{ route('admin.constructions.edit',$construction) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>

                                    <form
                                        action="{{ route('admin.constructions.destroy',$construction) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ce projet ?')">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center py-5">

                                <i class="fa-solid fa-building fa-3x text-secondary mb-3"></i>

                                <h5>

                                    Aucun projet de construction

                                </h5>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $constructions->links() }}

            </div>

        </div>

    </div>

</div>

@endsection