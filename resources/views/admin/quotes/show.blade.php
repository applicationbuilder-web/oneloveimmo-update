@extends('layouts.admin')

@section('title', 'Détail de la demande')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header">

            <h4 class="mb-0">

                <i class="fa-solid fa-file-signature text-warning me-2"></i>

                Détail de la demande de devis

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="fw-bold text-muted">
                        Nom complet
                    </label>

                    <p>{{ $quote->fullname }}</p>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="fw-bold text-muted">
                        Téléphone
                    </label>

                    <p>{{ $quote->phone }}</p>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="fw-bold text-muted">
                        Email
                    </label>

                    <p>{{ $quote->email ?: '-' }}</p>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="fw-bold text-muted">
                        Ville
                    </label>

                    <p>{{ $quote->city }}</p>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="fw-bold text-muted">
                        Type de projet
                    </label>

                    <p>{{ $quote->project_type }}</p>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="fw-bold text-muted">
                        Budget
                    </label>

                    <p>

                        @if($quote->budget)

                            {{ number_format($quote->budget,0,',',' ') }} FCFA

                        @else

                            -

                        @endif

                    </p>

                </div>

                <div class="col-md-12 mb-4">

                    <label class="fw-bold text-muted">
                        Message
                    </label>

                    <div class="border rounded p-3 bg-light">

                        {!! nl2br(e($quote->message)) !!}

                    </div>

                </div>

                <div class="col-md-12 mb-4">

                    <label class="fw-bold text-muted">
                        Pièce jointe
                    </label>

                    <div>

                        @if($quote->attachment)

                            <a
                                href="{{ asset('storage/'.$quote->attachment) }}"
                                target="_blank"
                                class="btn btn-outline-primary">

                                <i class="fa-solid fa-download me-2"></i>

                                Télécharger le fichier

                            </a>

                        @else

                            <span class="text-muted">

                                Aucune pièce jointe

                            </span>

                        @endif

                    </div>

                </div>

                <div class="col-md-12">

                    <label class="fw-bold text-muted">
                        Date de la demande
                    </label>

                    <p>

                        {{ $quote->created_at->format('d/m/Y à H:i') }}

                    </p>

                </div>

            </div>

        </div>

        <div class="card-footer d-flex justify-content-between">

            <a
                href="{{ route('admin.quotes.index') }}"
                class="btn btn-secondary">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Retour

            </a>

            <form
                action="{{ route('admin.quotes.destroy',$quote) }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    class="btn btn-danger"
                    onclick="return confirm('Supprimer cette demande ?')">

                    <i class="fa-solid fa-trash me-2"></i>

                    Supprimer

                </button>

            </form>

        </div>

    </div>

</div>

@endsection