<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
            OneLove <span class="text-warning">Immo</span>
        </a>

        {{-- Bouton Mobile --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Biens
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        À propos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Contact
                    </a>
                </li>

            </ul>

            <a href="#" class="btn btn-warning px-4">
                Se connecter
            </a>

        </div>

    </div>
</nav>