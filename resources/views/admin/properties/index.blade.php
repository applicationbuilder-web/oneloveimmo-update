@extends('layouts.admin')

@section('title','Gestion des biens')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Gestion des biens</h2>

    <a href="{{ route('admin.properties.create') }}"
       class="btn btn-primary">

        <i class="fa-solid fa-plus"></i>

        Ajouter un bien

    </a>

</div>

<table class="table table-bordered table-hover bg-white">

    <thead>

        <tr>

            <th>ID</th>

            <th>Image</th>

            <th>Titre</th>

            <th>Ville</th>

            <th>Prix</th>

            <th>Statut</th>

            <th width="180">Actions</th>

        </tr>

    </thead>

    <tbody>

        {{-- Les données arriveront dans la prochaine étape --}}

    </tbody>

</table>

@endsection