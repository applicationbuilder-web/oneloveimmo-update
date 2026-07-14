<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Administration - OneLove Immo')</title>

    {{-- CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="admin-wrapper">

        {{-- Barre latérale --}}
        @include('admin.partials.sidebar')

        <div class="admin-content">

            {{-- Barre supérieure --}}
            @include('admin.partials.topbar')

            <div class="admin-page">

                {{-- Message de succès --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Fermer">
                        </button>

                    </div>

                @endif

                {{-- Erreurs de validation --}}
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>Veuillez corriger les erreurs suivantes :</strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                {{-- Contenu des pages --}}
                @yield('content')

            </div>

        </div>

    </div>

</body>

</html>