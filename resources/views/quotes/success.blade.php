@extends('layouts.app')

@section('title', 'Demande envoyée')

@section('content')

<div class="container py-5">

    <div class="text-center">

        <div class="alert alert-success">

            <h2>

                Merci !

            </h2>

            <p>

                Votre demande de devis a été envoyée avec succès.

            </p>

        </div>

        <a
            href="{{ route('home') }}"
            class="btn btn-primary">

            Retour à l'accueil

        </a>

    </div>

</div>

@endsection