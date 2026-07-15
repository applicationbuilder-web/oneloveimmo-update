@extends('layouts.admin')

@section('title', 'Modifier un bien')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Modifier le bien
            </h2>

            <p class="text-muted mb-0">
                Mise à jour des informations immobilières.
            </p>

        </div>

        <a href="{{ route('admin.properties.index') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-2"></i>

            Retour

        </a>

    </div>


    <div class="card shadow border-0">

        <div class="card-body">


            <form action="{{ route('admin.properties.update', $property) }}"
                  method="POST"
                  enctype="multipart/form-data">


                @csrf

                @method('PUT')


                <div class="row">


                    <!-- Titre -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Titre
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title',$property->title) }}"
                            class="form-control">

                    </div>


                    <!-- Catégorie -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Catégorie
                        </label>


                        <select
                            name="category_id"
                            class="form-select">


                            <option value="">
                                Choisir une catégorie
                            </option>


                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ $property->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach


                        </select>

                    </div>


                    <!-- Type -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Type
                        </label>


                        <input
                            type="text"
                            name="type"
                            value="{{ old('type',$property->type) }}"
                            class="form-control">

                    </div>


                    <!-- Ville -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Ville
                        </label>


                        <input
                            type="text"
                            name="city"
                            value="{{ old('city',$property->city) }}"
                            class="form-control">

                    </div>



                    <!-- Adresse -->
                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Adresse
                        </label>


                        <input
                            type="text"
                            name="address"
                            value="{{ old('address',$property->address) }}"
                            class="form-control">

                    </div>



                    <!-- Prix -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Prix FCFA
                        </label>


                        <input
                            type="number"
                            name="price"
                            value="{{ old('price',$property->price) }}"
                            class="form-control">

                    </div>



                    <!-- Surface -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Surface m²
                        </label>


                        <input
                            type="number"
                            name="surface"
                            value="{{ old('surface',$property->surface) }}"
                            class="form-control">

                    </div>



                    <!-- Chambres -->
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Chambres
                        </label>


                        <input
                            type="number"
                            name="bedrooms"
                            value="{{ old('bedrooms',$property->bedrooms) }}"
                            class="form-control">

                    </div>



                    <!-- Salle de bain -->
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Salles de bain
                        </label>


                        <input
                            type="number"
                            name="bathrooms"
                            value="{{ old('bathrooms',$property->bathrooms) }}"
                            class="form-control">

                    </div>



                    <!-- Statut -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Statut
                        </label>


                        <select
                            name="status"
                            class="form-select">


                            <option value="a_vendre"
                            {{ $property->status == 'a_vendre' ? 'selected' : '' }}>

                                À vendre

                            </option>


                            <option value="a_louer"
                            {{ $property->status == 'a_louer' ? 'selected' : '' }}>

                                À louer

                            </option>


                        </select>


                    </div>



                    <!-- Featured -->
                    <div class="col-md-6 mb-3">


                        <label class="form-label">
                            Options
                        </label>


                        <div class="form-check">


                            <input
                                type="checkbox"
                                name="featured"
                                value="1"
                                class="form-check-input"
                                {{ $property->featured ? 'checked' : '' }}>


                            <label class="form-check-label">

                                Bien en vedette

                            </label>


                        </div>


                    </div>



                    <!-- Image actuelle -->
                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Image actuelle

                        </label>


                        @if($property->image)

                            <div>

                                <img
                                    src="{{ asset('storage/'.$property->image) }}"
                                    width="180"
                                    class="rounded shadow">

                            </div>

                        @else

                            <p>
                                Aucune image
                            </p>

                        @endif


                    </div>



                    <!-- Nouvelle image -->
                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Remplacer l'image

                        </label>


                        <input
                            type="file"
                            name="image"
                            id="imageInput"
                            class="form-control"
                            accept="image/*">



                        <img
                            id="previewImage"
                            class="img-fluid rounded mt-3 shadow"
                            style="display:none;max-height:220px;">


                    </div>




                    <!-- Description -->
                    <div class="col-12 mb-4">


                        <label class="form-label">

                            Description

                        </label>


                        <textarea
                            name="description"
                            rows="6"
                            class="form-control">{{ old('description',$property->description) }}</textarea>


                    </div>



                </div>



                <button class="btn btn-success">

                    <i class="fa-solid fa-save me-2"></i>

                    Mettre à jour

                </button>


            </form>


        </div>

    </div>


</div>



@push('scripts')

<script>

document.getElementById('imageInput').addEventListener('change', function(e){

    if(e.target.files.length > 0){

        let reader = new FileReader();

        reader.onload = function(event){

            let preview = document.getElementById('previewImage');

            preview.src = event.target.result;

            preview.style.display = 'block';

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});


</script>

@endpush


@endsection