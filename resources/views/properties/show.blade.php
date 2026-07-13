@extends('layouts.app')

@section('title', $property->title)

@section('content')

<section class="py-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-7">

                <img
                    src="{{ asset('assets/images/properties/'.$property->image) }}"
                    class="img-fluid rounded shadow"
                    alt="{{ $property->title }}">

            </div>

            <div class="col-lg-5">

                <span class="badge bg-warning text-dark mb-3">

                    {{ $property->status == 'a_vendre' ? 'À vendre' : 'À louer' }}

                </span>

                <h1 class="fw-bold">

                    {{ $property->title }}

                </h1>

                <h3 class="text-primary my-4">

                    {{ number_format($property->price,0,',',' ') }} FCFA

                </h3>

                <p>

                    <i class="fa-solid fa-location-dot"></i>

                    {{ $property->city }}

                </p>

                <hr>

                <div class="row text-center">

                    <div class="col-4">

                        <i class="fa-solid fa-ruler-combined"></i>

                        <p>{{ $property->surface }} m²</p>

                    </div>

                    <div class="col-4">

                        <i class="fa-solid fa-bed"></i>

                        <p>{{ $property->bedrooms }}</p>

                    </div>

                    <div class="col-4">

                        <i class="fa-solid fa-bath"></i>

                        <p>{{ $property->bathrooms }}</p>

                    </div>

                </div>

                <hr>

                <p>

                    {{ $property->description }}

                </p>

                <a href="#" class="btn btn-primary btn-lg w-100">

                    Demander des informations

                </a>

            </div>

        </div>

    </div>

</section>

@endsection