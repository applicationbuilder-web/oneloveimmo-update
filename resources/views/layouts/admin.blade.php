<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

<div class="admin-wrapper">

    @include('admin.partials.sidebar')

    <div class="admin-content">

        @include('admin.partials.topbar')

        <div class="admin-page">

            @yield('content')

        </div>

    </div>

</div>

</body>

</html>