@extends('layouts.admin')

@section('title', 'Demandes de devis')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fa-solid fa-file-signature text-warning me-2"></i>
                Demandes de devis
            </h4>

            <span class="badge bg-primary fs-6">
                {{ $quotes->total() }} demande(s)
            </span>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>ID</th>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>Projet</th>
                            <th>Ville</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th class="text-center" width="170">
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

                                <strong>
                                    {{ $quote->fullname }}
                                </strong>

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

                                @if($quote->status == 'nouveau')

                                    <span class="badge bg-danger">
                                        Nouveau
                                    </span>

                                @elseif($quote->status == 'en_cours')

                                    <span class="badge bg-warning text-dark">
                                        En cours
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        Traité
                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $quote->created_at->format('d/m/Y') }}

                            </td>

                            <td class="text-center">

                                <div class="d-flex justify-content-center">

                                    <a
                                        href="{{ route('admin.quotes.show',$quote) }}"
                                        class="btn btn-outline-info btn-sm rounded-circle mx-1 action-btn"
                                        title="Voir">

                                        <i class="fa-solid fa-eye"></i>

                                    </a>

                                    <form
                                        action="{{ route('admin.quotes.destroy',$quote) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-outline-danger btn-sm rounded-circle mx-1 action-btn"
                                            onclick="return confirm('Supprimer cette demande ?')">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center py-5">

                                <i class="fa-solid fa-file-circle-xmark fa-3x text-secondary mb-3"></i>

                                <h5>Aucune demande de devis</h5>

                                <p class="text-muted mb-0">
                                    Les nouvelles demandes apparaîtront ici.
                                </p>

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