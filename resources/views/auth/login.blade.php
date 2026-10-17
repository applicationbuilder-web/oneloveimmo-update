<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administration — OneLove Immo</title>

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

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ======================================================
           PAGE DE CONNEXION — DESIGN SYSTEM ULTRA-PREMIUM
        ====================================================== */
        :root {
            --login-bg: #f1f5f9;
            --login-card-bg: #ffffff;
            --login-card-border: rgba(226, 232, 240, 0.8);
            --login-text: #0f172a;
            --login-muted: #64748b;
            --login-input-bg: #f8fafc;
            --login-input-border: #cbd5e1;
            --login-input-focus: #0F4C81;
        }

        html[data-theme="dark"] {
            --login-bg: #090d14;
            --login-card-bg: #161b22;
            --login-card-border: rgba(48, 54, 61, 0.8);
            --login-text: #e6edf3;
            --login-muted: #8b949e;
            --login-input-bg: #0d1117;
            --login-input-border: #30363d;
            --login-input-focus: #1478ff;
        }

        body.login-page {
            font-family: 'Poppins', sans-serif;
            background: var(--login-bg);
            color: var(--login-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
            transition: background-color 0.4s ease, color 0.4s ease;
        }

        /* Arrière-plan décoratif subtil */
        .login-bg-glow-1 {
            position: absolute;
            top: -150px;
            right: -100px;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(15, 76, 129, 0.15) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .login-bg-glow-2 {
            position: absolute;
            bottom: -150px;
            left: -100px;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* Header flottant */
        .login-header-bar {
            position: relative;
            z-index: 10;
            padding: 24px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .login-back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--login-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 50px;
            background: var(--login-card-bg);
            border: 1px solid var(--login-card-border);
            transition: all 0.25s ease;
        }

        .login-back-link:hover {
            color: #0F4C81;
            transform: translateX(-3px);
            border-color: #0F4C81;
            box-shadow: 0 4px 12px rgba(15, 76, 129, 0.12);
        }

        html[data-theme="dark"] .login-back-link:hover {
            color: #1478ff;
            border-color: #1478ff;
        }

        /* Container principal */
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        /* Carte de connexion principale */
        .login-card {
            width: 100%;
            max-width: 980px;
            background: var(--login-card-bg);
            border: 1px solid var(--login-card-border);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 25px 60px -15px rgba(15, 76, 129, 0.2);
            transition: all 0.35s ease;
        }

        /* Volet gauche : Showcase de la marque */
        .login-brand-panel {
            background: linear-gradient(145deg, #071527 0%, #0F4C81 55%, #0a2540 100%);
            color: #ffffff;
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .login-brand-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.6;
            pointer-events: none;
        }

        .login-brand-panel-glow {
            position: absolute;
            bottom: -60px;
            right: -60px;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.3) 0%, transparent 70%);
            pointer-events: none;
        }

        .login-brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #ffbf00;
        }

        .login-brand-logo-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: linear-gradient(135deg, #F97316 0%, #ffbf00 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 24px;
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.35);
        }

        .login-feature-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 20px;
        }

        .login-feature-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffbf00;
            font-size: 15px;
            flex-shrink: 0;
        }

        /* Volet droit : Formulaire */
        .login-form-panel {
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 575.98px) {
            .login-form-panel {
                padding: 35px 22px;
            }
        }

        /* Input groups stylisés */
        .login-input-group {
            position: relative;
            margin-bottom: 22px;
        }

        .login-input-group .form-label {
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 8px;
            color: var(--login-text);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .login-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .login-input-icon {
            position: absolute;
            left: 16px;
            color: var(--login-muted);
            font-size: 16px;
            pointer-events: none;
            transition: color 0.25s ease;
            z-index: 3;
        }

        .login-input-wrapper .form-control {
            height: 52px;
            padding-left: 48px;
            padding-right: 48px;
            background: var(--login-input-bg);
            border: 1.5px solid var(--login-input-border);
            border-radius: 14px;
            color: var(--login-text);
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .login-input-wrapper .form-control:focus {
            background: var(--login-card-bg);
            border-color: var(--login-input-focus);
            box-shadow: 0 0 0 4px rgba(15, 76, 129, 0.15);
        }

        .login-input-wrapper .form-control:focus + .login-input-icon,
        .login-input-wrapper:focus-within .login-input-icon {
            color: var(--login-input-focus);
        }

        .toggle-password-btn {
            position: absolute;
            right: 12px;
            background: none;
            border: none;
            color: var(--login-muted);
            cursor: pointer;
            padding: 8px;
            font-size: 16px;
            transition: color 0.2s ease, transform 0.2s ease;
            z-index: 4;
        }

        .toggle-password-btn:hover {
            color: var(--login-input-focus);
            transform: scale(1.1);
        }

        /* Bouton de validation */
        .btn-login-submit {
            height: 52px;
            border-radius: 14px;
            background: linear-gradient(135deg, #0F4C81 0%, #1478ff 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(15, 76, 129, 0.35);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-login-submit:hover {
            background: linear-gradient(135deg, #0d3d68 0%, #0d62d4 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(15, 76, 129, 0.45);
            color: #ffffff;
        }

        .btn-login-submit:active {
            transform: translateY(0);
        }

        /* Badge sécurité en bas */
        .login-security-notice {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--login-card-border);
            text-align: center;
            font-size: 12px;
            color: var(--login-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .login-security-notice i {
            color: #10b981;
        }
    </style>
</head>

<body class="login-page">

    {{-- Arrière-plans lumineux décoratifs --}}
    <div class="login-bg-glow-1"></div>
    <div class="login-bg-glow-2"></div>

    {{-- Barre supérieure --}}
    <header class="login-header-bar">
        <a href="{{ route('home') }}" class="login-back-link" title="Revenir au site public">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Retour au site</span>
        </a>

        {{-- Toggle Dark/Light Mode --}}
        <button class="theme-toggle-btn border-0" id="themeToggleLogin" title="Changer le thème" aria-label="Changer le thème">
            <i class="fa-solid fa-sun icon-sun"></i>
            <i class="fa-solid fa-moon icon-moon"></i>
        </button>
    </header>

    {{-- Zone principale --}}
    <main class="login-container">
        <div class="login-card">
            <div class="row g-0">

                {{-- VOLET GAUCHE : Branding & Présentation --}}
                <div class="col-lg-5 d-none d-lg-flex login-brand-panel">
                    <div class="login-brand-panel-glow"></div>

                    {{-- En-tête marque --}}
                    <div class="position-relative z-2">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="login-brand-logo-icon">
                                <i class="fa-solid fa-house-chimney"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0 text-white tracking-tight">
                                    OneLove <span class="text-warning">Immo</span>
                                </h3>
                                <small class="text-white-50">Espace Administration</small>
                            </div>
                        </div>

                        <span class="login-brand-badge mb-4 d-inline-flex">
                            <i class="fa-solid fa-shield-halved"></i>
                            Portail Sécurisé
                        </span>

                        <h2 class="fw-bold display-7 text-white mt-3 mb-3" style="font-size: 26px; line-height: 1.35;">
                            Gérez votre agence immobilière en toute sérénité.
                        </h2>
                        <p class="text-white-50 small mb-0">
                            Centralisation des biens, suivi des chantiers de construction, traitement des demandes de devis et gestion de contenu.
                        </p>
                    </div>

                    {{-- Points forts --}}
                    <div class="position-relative z-2 my-4">
                        <div class="login-feature-item">
                            <div class="login-feature-icon">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block small">Sécurité Renforcée</strong>
                                <span class="text-white-50" style="font-size: 12px;">Sessions chiffrées & contrôle d'accès strict.</span>
                            </div>
                        </div>

                        <div class="login-feature-item">
                            <div class="login-feature-icon">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block small">Supervision en Temps Réel</strong>
                                <span class="text-white-50" style="font-size: 12px;">Tableau de bord interactif avec KPIs récents.</span>
                            </div>
                        </div>

                        <div class="login-feature-item mb-0">
                            <div class="login-feature-icon">
                                <i class="fa-solid fa-moon"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block small">Mode Sombre & Clair</strong>
                                <span class="text-white-50" style="font-size: 12px;">Confort visuel adapté à vos préférences.</span>
                            </div>
                        </div>
                    </div>

                    {{-- Bas de volet : Signature Concepteur --}}
                    <div class="position-relative z-2 pt-3 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between">
                        <small class="text-white-50" style="font-size: 11px;">
                            © {{ date('Y') }} OneLove Immo
                        </small>
                        <a href="https://wa.me/242066819388?text={{ urlencode('Bonjour, je vous contacte suite à la visite du portail OneLove Immo.') }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="designer-badge"
                           style="font-size: 11px; padding: 2px 10px;"
                           title="WhatsApp Concepteur">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>+242066819388</span>
                        </a>
                    </div>
                </div>

                {{-- VOLET DROIT : Formulaire de Connexion --}}
                <div class="col-lg-7 login-form-panel">

                    {{-- Logo affiché uniquement sur mobile --}}
                    <div class="text-center d-lg-none mb-4">
                        <div class="login-brand-logo-icon mx-auto mb-2" style="width: 48px; height: 48px; font-size: 20px;">
                            <i class="fa-solid fa-house-chimney"></i>
                        </div>
                        <h4 class="fw-bold mb-1">
                            OneLove <span class="text-warning">Immo</span>
                        </h4>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill small">
                            Administration
                        </span>
                    </div>

                    {{-- Titre du formulaire --}}
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1" style="font-size: 24px;">
                            Connexion Administrateur
                        </h2>
                        <p class="text-muted small mb-0">
                            Entrez vos identifiants pour accéder à l'espace de gestion.
                        </p>
                    </div>

                    {{-- Message d'état (ex : mot de passe réinitialisé ou session) --}}
                    @if(session('status'))
                        <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 rounded-3 mb-4" role="alert">
                            <i class="fa-solid fa-circle-check text-success fs-5"></i>
                            <div class="small">{{ session('status') }}</div>
                        </div>
                    @endif

                    {{-- Alerte d'erreur générale --}}
                    @if($errors->any())
                        <div class="alert alert-danger d-flex align-items-start gap-2 py-2 px-3 rounded-3 mb-4" role="alert">
                            <i class="fa-solid fa-triangle-exclamation text-danger fs-5 mt-1"></i>
                            <div class="small">
                                <strong>Échec d'authentification :</strong>
                                <ul class="mb-0 ps-3 mt-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        {{-- Email --}}
                        <div class="login-input-group">
                            <label for="email" class="form-label">
                                <i class="fa-regular fa-envelope text-primary"></i>
                                <span>Adresse email</span>
                            </label>
                            <div class="login-input-wrapper">
                                <i class="fa-solid fa-envelope login-input-icon"></i>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="adresse@email.com"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username">
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1 ms-1">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Mot de passe --}}
                        <div class="login-input-group">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <label for="password" class="form-label mb-0">
                                    <i class="fa-solid fa-lock text-primary"></i>
                                    <span>Mot de passe</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="small text-decoration-none fw-medium text-primary">
                                        Mot de passe oublié ?
                                    </a>
                                @endif
                            </div>
                            <div class="login-input-wrapper">
                                <i class="fa-solid fa-key login-input-icon"></i>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="••••••••••••"
                                    required
                                    autocomplete="current-password">
                                <button type="button" class="toggle-password-btn" id="togglePasswordBtn" title="Afficher / Masquer le mot de passe" aria-label="Afficher le mot de passe">
                                    <i class="fa-regular fa-eye" id="togglePasswordIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1 ms-1">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Se souvenir de moi --}}
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label small" for="remember" style="cursor: pointer;">
                                    Rester connecté
                                </label>
                            </div>
                        </div>

                        {{-- Bouton de soumission --}}
                        <button type="submit" class="btn btn-login-submit w-100" id="loginSubmitBtn">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span>Accéder au Tableau de Bord</span>
                        </button>

                        {{-- Notice de sécurité --}}
                        <div class="login-security-notice">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Connexion chiffrée SSL • Accès restreint et tracé</span>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </main>

    {{-- Script pour basculer la visibilité du mot de passe --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('togglePasswordBtn');
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');

            if (toggleBtn && passwordInput && icon) {
                toggleBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    icon.classList.toggle('fa-eye', !isPassword);
                    icon.classList.toggle('fa-eye-slash', isPassword);
                    toggleBtn.setAttribute('title', isPassword ? 'Masquer le mot de passe' : 'Afficher le mot de passe');
                });
            }

            // Bouton de toggle thème sur la page de login
            const themeBtn = document.getElementById('themeToggleLogin');
            if (themeBtn && window.ThemeManager) {
                themeBtn.addEventListener('click', function () {
                    window.ThemeManager.toggle();
                });
            }
        });
    </script>
</body>

</html>