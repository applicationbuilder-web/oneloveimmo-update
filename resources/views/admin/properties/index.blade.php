@extends('layouts.admin')

@section('title', 'Gestion des biens')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Liste des biens immobiliers
            </h4>

            <a href="{{ route('admin.properties.create') }}"
                class="btn btn-success">

                <i class="fa-solid fa-plus me-2"></i>

                Ajouter un bien

            </a>

        </div>


        <div class="card-body">


            <div class="table-responsive">

                <table class="table table-hover align-middle text-nowrap">

                    <thead class="table-light">

                        <tr>

                            <th>ID</th>

                            <th>Image</th>

                            <th>Titre</th>

                            <th>Catégorie</th>

                            <th>Ville</th>

                            <th>Prix</th>

                            <th>Statut</th>

                            <th class="text-center" style="min-width: 180px;">
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody>

                        @forelse($properties as $property)

                        <tr>

                            <td>

                                {{ $property->id }}

                            </td>


                            <td>

                                @php

                                $image = $property->image
                                ? asset('storage/'.$property->image)
                                : asset('assets/images/no-image.jpg');

                                @endphp


                                <img
                                    src="{{ $image }}"
                                    alt="{{ $property->title }}"
                                    width="100"
                                    height="80"
                                    class="rounded shadow-sm"
                                    style="object-fit:cover;">


                            </td>


                            <td>

                                <strong>

                                    {{ $property->title }}

                                </strong>


                                @if($property->featured)

                                <br>

                                <span class="badge bg-primary mt-1">

                                    ⭐ Vedette

                                </span>

                                @endif


                            </td>


                            <td>

                                @if($property->category)

                                <span class="badge bg-secondary">

                                    {{ $property->category->name }}

                                </span>

                                @else

                                -

                                @endif


                            </td>


                            <td>

                                <i class="fa-solid fa-location-dot text-danger"></i>

                                {{ $property->city }}


                            </td>


                            <td>

                                <strong>

                                    {{ number_format($property->price,0,',',' ') }}

                                </strong>

                                FCFA


                            </td>


                            <td>


                                @if($property->status == 'a_vendre')


                                <span class="badge bg-success">

                                    À vendre

                                </span>


                                @else


                                <span class="badge bg-warning text-dark">

                                    À louer

                                </span>


                                @endif


                            </td>


                            <td class="text-center">

                                <div class="d-flex justify-content-center align-items-center">

                                    <a
                                        href="{{ route('admin.properties.show', $property) }}"
                                        class="btn btn-outline-info btn-sm mx-1 rounded-circle action-btn"
                                        title="Voir">

                                        <i class="fa-solid fa-eye"></i>

                                    </a>

                                    <a
                                        href="{{ route('admin.properties.edit', $property) }}"
                                        class="btn btn-outline-warning btn-sm mx-1 rounded-circle action-btn"
                                        title="Modifier">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>

                                    <form
                                        action="{{ route('admin.properties.destroy', $property) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm mx-1 rounded-circle action-btn"
                                            onclick="return confirm('Supprimer ce bien ?')">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                        @empty


                        <tr>

                            <td colspan="8" class="text-center py-4">


                                <i class="fa-solid fa-house-circle-xmark fa-2x mb-2"></i>


                                <p class="mb-0">

                                    Aucun bien enregistré.

                                </p>


                            </td>

                        </tr>


                        @endforelse


                    </tbody>

                </table>

                <div class="mt-4">

                    {{ $properties->links() }}

                </div>