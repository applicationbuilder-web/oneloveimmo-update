@extends('layouts.admin')

@section('title', 'Ajouter un bien')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3>Ajouter un bien immobilier</h3>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.properties.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Titre</label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Catégorie</label>

                        <select name="category_id"
                                class="form-select"
                                required>

                            <option value="">Choisir...</option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <button class="btn btn-primary">

                    Enregistrer

                </button>

            </form>

        </div>

    </div>

</div>

@endsection