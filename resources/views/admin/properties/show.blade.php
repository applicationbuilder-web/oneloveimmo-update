@extends('layouts.admin')

@section('title', 'Détails du bien')

@section('content')

<div class="container-fluid py-4">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Détails du bien immobilier
            </h2>

            <p class="text-muted mb-0">
                Informations complètes du bien.
            </p>

        </div>


        <div>

            <a href="{{ route('admin.properties.edit',$property) }}"
               class="btn btn-warning me-2">

                <i class="fa-solid fa-pen me-2"></i>

                Modifier

            </a>


            <a href="{{ route('admin.properties.index') }}"
               class="btn btn-secondary">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Retour

            </a>

        </div>

    </div>



    <div class="card shadow border-0">


        <div class="card-body">


            <div class="row">


                <!-- Image -->
                <div class="col-md-5 mb-4">


                    @if($property->image)

                        <img
                            src="{{ asset('storage/'.$property->image) }}"
                            class="img-fluid rounded shadow"
                            alt="{{ $property->title }}">


                    @else

                        <div class="alert alert-secondary">

                            Aucune image disponible.

                        </div>


                    @endif


                </div>



                <!-- Informations -->
                <div class="col-md-7">


                    <h3 class="fw-bold">

                        {{ $property->title }}

                    </h3>



                    <hr>



                    <p>

                        <strong>
                            Catégorie :
                        </strong>

                        {{ $property->category?->name ?? 'Non définie' }}

                    </p>



                    <p>

                        <strong>
                            Type :
                        </strong>

                        {{ $property->type }}

                    </p>



                    <p>

                        <strong>
                            Localisation :
                        </strong>

                        {{ $property->city }}
                        -
                        {{ $property->address }}

                    </p>



                    <p>

                        <strong>
                            Prix :
                        </strong>

                        {{ number_format($property->price,0,',',' ') }}
                        FCFA

                    </p>



                    <p>

                        <strong>
                            Surface :
                        </strong>

                        {{ $property->surface }}
                        m²

                    </p>



                    <p>

                        <strong>
                            Chambres :
                        </strong>

                        {{ $property->bedrooms }}

                    </p>



                    <p>

                        <strong>
                            Salles de bain :
                        </strong>

                        {{ $property->bathrooms }}

                    </p>



                    <p>

                        <strong>
                            Statut :
                        </strong>


                        @if($property->status == 'a_vendre')

                            <span class="badge bg-success">

                                À vendre

                            </span>

                        @else

                            <span class="badge bg-warning text-dark">

                                À louer

                            </span>

                        @endif


                    </p>



                    @if($property->featured)

                        <p>

                            <span class="badge bg-primary">

                                ⭐ Bien en vedette

                            </span>

                        </p>

                    @endif



                </div>


            </div>



            <hr>



            <h5 class="fw-bold">

                Description

            </h5>


            <p>

                {{ $property->description }}

            </p>



        </div>


    </div>


</div>

@endsection