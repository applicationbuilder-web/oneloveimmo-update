@extends('layouts.admin')

@section('title', 'Paramètres du site')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Paramètres du site
        </h2>

        <p class="text-muted mb-0">
            Gérez les éléments principaux de votre site OneLove Immo.
        </p>

    </div>


    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Erreur :</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-4">

            <h5 class="fw-bold mb-1">
                Image principale du site
            </h5>

            <p class="text-muted mb-0">
                Cette image sera utilisée comme image principale du Hero de la page d'accueil.
            </p>

        </div>


        <div class="card-body p-4">

            <form
                method="POST"
                action="{{ route('admin.settings.update') }}"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                {{-- IMAGE ACTUELLE --}}

                @if($settings->hero_image)

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Image actuelle
                        </label>

                        <div class="mt-2">

                            <img
                                src="{{ asset('storage/' . $settings->hero_image) }}"
                                alt="Image Hero actuelle"
                                class="img-fluid rounded shadow-sm"
                                style="
                                    width: 100%;
                                    max-width: 700px;
                                    height: 300px;
                                    object-fit: cover;
                                ">

                        </div>

                    </div>

                @else

                    <div class="alert alert-info">

                        <i class="fa-solid fa-image me-2"></i>

                        Aucune image Hero n'est encore configurée.

                    </div>

                @endif


                {{-- NOUVELLE IMAGE --}}

                <div class="mb-4">

                    <label
                        for="hero_image"
                        class="form-label fw-semibold">

                        Nouvelle image Hero

                    </label>

                    <input
                        type="file"
                        name="hero_image"
                        id="hero_image"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp">

                    <div class="form-text">

                        Formats acceptés : JPG, JPEG, PNG, WEBP.
                        Taille maximale : 4 Mo.

                    </div>

                </div>


                {{-- APERÇU --}}

                <div
                    id="image-preview-container"
                    class="mb-4"
                    style="display: none;">

                    <label class="form-label fw-semibold">
                        Aperçu de la nouvelle image
                    </label>

                    <div>

                        <img
                            id="image-preview"
                            src="#"
                            alt="Aperçu"
                            class="img-fluid rounded shadow-sm"
                            style="
                                width: 100%;
                                max-width: 700px;
                                height: 300px;
                                object-fit: cover;
                            ">

                    </div>

                </div>


                {{-- BOUTON --}}

                <button
                    type="submit"
                    class="btn btn-primary px-4">

                    <i class="fa-solid fa-cloud-arrow-up me-2"></i>

                    Enregistrer l'image

                </button>

            </form>

        </div>

    </div>

</div>


{{-- APERÇU DE L'IMAGE AVANT ENVOI --}}

<script>

    const heroImageInput = document.getElementById('hero_image');

    const previewContainer = document.getElementById('image-preview-container');

    const previewImage = document.getElementById('image-preview');


    heroImageInput.addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (!file) {

            previewContainer.style.display = 'none';

            return;

        }

        const reader = new FileReader();

        reader.onload = function(e) {

            previewImage.src = e.target.result;

            previewContainer.style.display = 'block';

        };

        reader.readAsDataURL(file);

    });

</script>

@endsection