@extends('layouts.app')

@section('title', 'Nos biens')

@section('content')

<div class="container py-5">

    <h1 class="mb-4">
        Nos biens immobiliers
    </h1>


    @if($properties->count() > 0)

        <div class="row">

            @foreach($properties as $property)

                <div class="col-lg-4 mb-4">

                    <div class="card shadow">

                        <div class="card-body">

                            <h5>
                                {{ $property->title }}
                            </h5>

                            <p>
                                {{ $property->city }}
                            </p>

                            <strong>
                                {{ number_format($property->price, 0, ',', ' ') }} FCFA
                            </strong>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <p>
            Aucun bien disponible pour le moment.
        </p>

    @endif

</div>

@endsection