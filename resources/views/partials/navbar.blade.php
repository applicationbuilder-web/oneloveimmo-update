<nav class="navbar navbar-expand-lg shadow-sm sticky-top main-navbar" id="mainNavbar">
    <div class="container py-1">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="brand-icon-box">
                <i class="fa-solid fa-house-chimney text-white"></i>
            </span>
            <span class="fs-4 fw-bold tracking-tight">
                OneLove <span class="text-warning">Immo</span>
            </span>
        </a>

        {{-- Bouton Mobile + Toggle Thème --}}
        <div class="d-flex align-items-center gap-2 d-lg-none">
            <button class="theme-toggle-btn border-0" id="themeToggleMobile" title="Changer le thème" aria-label="Changer le thème">
                <i class="fa-solid fa-sun icon-sun"></i>
                <i class="fa-solid fa-moon icon-moon"></i>
            </button>
            <button class="navbar-toggler border-0 shadow-none px-2"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContent"
                aria-controls="navbarContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav mx-auto mb-3 mb-lg-0 py-2 py-lg-0 gap-lg-1">

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active fw-bold text-primary' : '' }}" href="{{ route('home') }}">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('properties.*') ? 'active fw-bold text-primary' : '' }}" href="{{ route('properties.index') }}">
                        Biens
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('construction.*') ? 'active fw-bold text-primary' : '' }}" href="{{ route('construction.index') }}">
                        Constructions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('about') ? 'active fw-bold text-primary' : '' }}" href="{{ route('about') }}">
                        À propos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('contact*') ? 'active fw-bold text-primary' : '' }}" href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>

            </ul>

            <div class="d-flex align-items-center gap-2">

                {{-- Toggle Dark/Light (desktop) --}}
                <button class="theme-toggle-btn border-0 d-none d-lg-inline-flex"
                    id="themeToggleDesktop"
                    title="Changer le thème"
                    aria-label="Changer le thème">
                    <i class="fa-solid fa-sun icon-sun"></i>
                    <i class="fa-solid fa-moon icon-moon"></i>
                </button>

                <a href="{{ route('quotes.create') }}"
                    class="btn btn-warning rounded-pill px-4 py-2 fw-semibold shadow-sm w-100 w-lg-auto d-inline-flex align-items-center justify-content-center gap-2">
                    <i class="fa-solid fa-file-signature"></i>
                    <span>Demander un devis</span>
                </a>

            </div>

        </div>

    </div>
</nav>