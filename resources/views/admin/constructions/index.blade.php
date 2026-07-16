@extends('layouts.admin')

@section('title', 'Constructions')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>

            Gestion des constructions

        </h2>

        <a
            href="{{ route('admin.constructions.create') }}"
            class="btn btn-success">

            <i class="fa-solid fa-plus"></i>

            Nouveau projet

        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>Image</th>

                            <th>Titre</th>

                            <th>Lieu</th>

                            <th>Type</th>

                            <th>Statut</th>

                            <th width="150">

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
                                            class="rounded">

                                    @else

                                        -

                                    @endif

                                </td>

                                <td>

                                    {{ $construction->title }}

                                </td>

                                <td>

                                    {{ $construction->location }}

                                </td>

                                <td>

                                    {{ $construction->type }}

                                </td>

                                <td>

                                    {{ ucfirst($construction->status) }}

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

                                <td colspan="7" class="text-center">

                                    Aucun projet enregistré.

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