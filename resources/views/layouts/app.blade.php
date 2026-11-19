<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'OneLove Immo | Immobilier et Construction au Congo')</title>

    <meta name="description" content="@yield('meta_description', 'OneLove Immo accompagne vos projets immobiliers et de construction au Congo : achat, vente, location, rénovation et réalisation de projets.')">

    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="OneLove Immo">
    <meta property="og:title" content="@yield('title', 'OneLove Immo | Immobilier et Construction au Congo')">
    <meta property="og:description" content="@yield('meta_description', 'Découvrez les biens immobiliers et les services de construction de OneLove Immo au Congo.')">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Script anti-flash : applique le thème avant le rendu CSS --}}
    <script>
        (function () {
            try {
                var theme = localStorage.getItem('onelove-theme');
                if (!theme) {
                    theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                }
                if (theme === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                }
            } catch (e) {}
        })();
    </script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    @include('partials.navbar')

    <main>

        @yield('content')

    </main>

    @include('partials.footer')


<script>
document.addEventListener('DOMContentLoaded', function () {

    // Cette fonctionnalité concerne uniquement le site public.
    document.querySelectorAll('form').forEach(function (form) {

        const fields = form.querySelectorAll(
            'input[required], select[required], textarea[required]'
        );

        fields.forEach(function (field) {

            // Recherche du libellé associé au champ.
            let label = null;

            if (field.id) {
                label = form.querySelector(
                    'label[for="' + field.id + '"]'
                );
            }

            if (!label) {
                label = field.closest('label');
            }

            // Ajout de l'étoile rouge sans doublon.
            if (label && !label.textContent.includes('*')) {
                const star = document.createElement('span');
                star.className = 'text-danger required-indicator';
                star.textContent = ' *';
                star.setAttribute('aria-hidden', 'true');
                label.appendChild(star);
            }

            // Messages de validation en français.
            function updateValidationMessage() {

                if (field.validity.valueMissing) {
                    field.setCustomValidity(
                        'Ce champ est obligatoire.'
                    );
                } else if (
                    field.type === 'email' &&
                    field.validity.typeMismatch
                ) {
                    field.setCustomValidity(
                        'Veuillez saisir une adresse e-mail valide.'
                    );
                } else {
                    field.setCustomValidity('');
                }
            }

            updateValidationMessage();

            field.addEventListener('input', updateValidationMessage);
            field.addEventListener('change', updateValidationMessage);
            field.addEventListener('invalid', updateValidationMessage);

        });
    });
});
</script>


</body>


</html>
