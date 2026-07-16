@extends('layouts.admin')

@section('title', 'Demandes de devis')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">

                Demandes de devis

            </h3>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>

                            <th>Nom</th>

                            <th>Téléphone</th>

                            <th>Projet</th>

                            <th>Ville</th>

                            <th>Statut</th>

                            <th>Date</th>

                            <th width="150">

                                Actions

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($quotes as $quote)

                        <tr>

                            <td>

                                {{ $quote->id }}

                            </td>

                            <td>

                                {{ $quote->fullname }}

                            </td>

                            <td>

                                {{ $quote->phone }}

                            </td>

                            <td>

                                {{ $quote->project_type }}

                            </td>

                            <td>

                                {{ $quote->city }}

                            </td>

                            <td>

                                <span class="badge bg-success">

                                    {{ ucfirst(str_replace('_',' ', $quote->status)) }}

                                </span>

                            </td>

                            <td>

                                {{ $quote->created_at->format('d/m/Y') }}

                            </td>

                            <td>

                                <div class="d-flex gap-1">

                                    <a
                                        href="{{ route('admin.quotes.show',$quote) }}"
                                        class="btn btn-info btn-sm">

                                        <i class="fa-solid fa-eye"></i>

                                    </a>

                                    <form
                                        action="{{ route('admin.quotes.destroy',$quote) }}"
                                        method="POST">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer cette demande ?')">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center">

                                Aucune demande de devis.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $quotes->links() }}

            </div>

        </div>

    </div>

</div>

@endsection