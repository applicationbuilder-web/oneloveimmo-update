<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO --}}
    <meta name="description" content="@yield('description', 'OneLove Immo - Votre partenaire immobilier de confiance.')">
    <meta name="keywords" content="@yield('keywords', 'immobilier, maison, villa, terrain, appartement')">
    <meta name="author" content="OneLove Immo">

    <title>@yield('title', 'OneLove Immo')</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- Bootstrap + CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

</head>

<body>

    @include('partials.navbar')

    <main>

        @yield('content')

    </main>

    @include('partials.footer')

    @stack('scripts')

</body>

</html>