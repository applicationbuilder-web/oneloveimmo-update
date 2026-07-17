@extends('layouts.admin')

@section('title', 'Messages')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h2 class="fw-bold">
            Messages de contact
        </h2>

        <p class="text-muted">
            Tous les messages envoyés depuis le formulaire de contact.
        </p>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>ID</th>

                            <th>Nom</th>

                            <th>Email</th>

                            <th>Téléphone</th>

                            <th>Sujet</th>

                            <th>Statut</th>

                            <th width="180">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($contacts as $contact)

                            <tr>

                                <td>{{ $contact->id }}</td>

                                <td>{{ $contact->name }}</td>

                                <td>{{ $contact->email }}</td>

                                <td>{{ $contact->phone }}</td>

                                <td>{{ $contact->subject }}</td>

                                <td>

                                    @if($contact->is_read)

                                        <span class="badge bg-success">
                                            Lu
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Non lu
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="fa fa-eye"></i>

                                    </a>

                                    <form
                                        action="{{ route('admin.contacts.destroy', $contact) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ce message ?')">

                                            <i class="fa fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    Aucun message reçu.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $contacts->links() }}

            </div>

        </div>

    </div>

</div>

@endsection