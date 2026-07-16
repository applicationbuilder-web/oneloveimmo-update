@extends('layouts.admin')

@section('title', 'Détail de la demande')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3>

                Détail de la demande

            </h3>

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="220">

                        Nom

                    </th>

                    <td>

                        {{ $quote->fullname }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Téléphone

                    </th>

                    <td>

                        {{ $quote->phone }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Email

                    </th>

                    <td>

                        {{ $quote->email ?: '-' }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Ville

                    </th>

                    <td>

                        {{ $quote->city }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Projet

                    </th>

                    <td>

                        {{ $quote->project_type }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Budget

                    </th>

                    <td>

                        {{ $quote->budget ? number_format($quote->budget,0,',',' ') . ' FCFA' : '-' }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Message

                    </th>

                    <td>

                        {!! nl2br(e($quote->message)) !!}

                    </td>

                </tr>

                <tr>

                    <th>

                        Pièce jointe

                    </th>

                    <td>

                        @if($quote->attachment)

                            <a
                                href="{{ asset('storage/'.$quote->attachment) }}"
                                target="_blank">

                                Voir le fichier

                            </a>

                        @else

                            -

                        @endif

                    </td>

                </tr>

            </table>

            <a
                href="{{ route('admin.quotes.index') }}"
                class="btn btn-secondary">

                Retour

            </a>

        </div>

    </div>

</div>

@endsection
