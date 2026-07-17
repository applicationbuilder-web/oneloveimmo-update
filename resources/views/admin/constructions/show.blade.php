@extends('layouts.admin')

@section('title', 'Détails du projet')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="mb-0">

                Détails du projet

            </h3>

            <a
                href="{{ route('admin.constructions.index') }}"
                class="btn btn-secondary">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Retour

            </a>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-lg-5">

                    @if($construction->image)

                        <img
                            src="{{ asset('storage/'.$construction->image) }}"
                            class="img-fluid rounded shadow">

                    @else

                        <img
                            src="{{ asset('assets/images/no-image.jpg') }}"
                            class="img-fluid rounded shadow">

                    @endif

                </div>

                <div class="col-lg-7">

                    <table class="table table-bordered">

                        <tr>

                            <th width="220">

                                Nom du projet

                            </th>

                            <td>

                                {{ $construction->title }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Ville

                            </th>

                            <td>

                                {{ $construction->city }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Statut

                            </th>

                            <td>

                                <span class="badge bg-success">

                                    {{ ucfirst($construction->status) }}

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Date de création

                            </th>

                            <td>

                                {{ $construction->created_at->format('d/m/Y H:i') }}

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

                    <div class="mt-4">

                        <a
                            href="{{ route('admin.constructions.edit',$construction) }}"
                            class="btn btn-warning">

                            <i class="fa-solid fa-pen me-2"></i>

                            Modifier

                        </a>

                        <form
                            action="{{ route('admin.constructions.destroy',$construction) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger"
                                onclick="return confirm('Supprimer ce projet ?')">

                                <i class="fa-solid fa-trash me-2"></i>

                                Supprimer

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection