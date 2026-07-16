@extends('layouts.admin')

@section('title', 'Détail du projet')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3>

                Détail du projet

            </h3>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-5">

                    @if($construction->image)

                        <img
                            src="{{ asset('storage/'.$construction->image) }}"
                            class="img-fluid rounded shadow">

                    @else

                        <img
                            src="{{ asset('assets/images/no-image.jpg') }}"
                            class="img-fluid rounded">

                    @endif

                </div>

                <div class="col-md-7">

                    <table class="table">

                        <tr>

                            <th width="180">

                                Titre

                            </th>

                            <td>

                                {{ $construction->title }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Localisation

                            </th>

                            <td>

                                {{ $construction->location }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Type

                            </th>

                            <td>

                                {{ $construction->type }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Statut

                            </th>

                            <td>

                                {{ ucfirst(str_replace('_',' ',$construction->status)) }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Description

                            </th>

                            <td>

                                {!! nl2br(e($construction->description)) !!}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            <a
                href="{{ route('admin.constructions.index') }}"
                class="btn btn-secondary mt-3">

                Retour

            </a>

        </div>

    </div>

</div>

@endsection