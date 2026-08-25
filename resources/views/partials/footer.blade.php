<footer class="bg-dark text-white pt-5 pb-3 mt-5">

    <div class="container">

        <div class="row">

            {{-- Présentation --}}
            <div class="col-lg-4 mb-4">

                <h4 class="fw-bold">
                    OneLove <span class="text-warning">Immo</span>
                </h4>

                <p class="mt-3">
                    Votre partenaire de confiance pour l'achat, la vente
                    et la location de biens immobiliers.
                </p>

            </div>


            {{-- Liens rapides --}}
            <div class="col-lg-4 mb-4">

                <h5 class="fw-bold">
                    Liens rapides
                </h5>

                <ul class="list-unstyled mt-3">

                    <li class="mb-2">
                        <a href="{{ route('home') }}"
                           class="text-white text-decoration-none">
                            Accueil
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('properties.index') }}"
                           class="text-white text-decoration-none">
                            Nos biens
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('about') }}"
                           class="text-white text-decoration-none">
                            À propos
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('contact') }}"
                           class="text-white text-decoration-none">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Coordonnées --}}
            <div class="col-lg-4 mb-4">

                <h5 class="fw-bold">
                    Contact
                </h5>


                {{-- Adresse --}}
                @if($settings?->contact_address)

                    <p class="mt-3 mb-2">

                        <i class="fas fa-map-marker-alt text-warning me-2"></i>

                        {{ $settings->contact_address }}

                    </p>

                @endif


                {{-- Téléphone --}}
                @if($settings?->contact_phone)

                    <p class="mb-2">

                        <i class="fas fa-phone text-warning me-2"></i>

                        {{ $settings->contact_phone }}

                    </p>

                @endif


                {{-- Email --}}
                @if($settings?->contact_email)

                    <p class="mb-3">

                        <i class="fas fa-envelope text-warning me-2"></i>

                        {{ $settings->contact_email }}

                    </p>

                @endif


                {{-- Réseaux sociaux --}}
                <div>

                    @if($settings?->facebook_url)

                        <a href="{{ $settings->facebook_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-white me-3">

                            <i class="fab fa-facebook fa-lg"></i>

                        </a>

                    @endif


                    @if($settings?->instagram_url)

                        <a href="{{ $settings->instagram_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-white me-3">

                            <i class="fab fa-instagram fa-lg"></i>

                        </a>

                    @endif


                    @if($settings?->linkedin_url)

                        <a href="{{ $settings->linkedin_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-white me-3">

                            <i class="fab fa-linkedin fa-lg"></i>

                        </a>

                    @endif


                    @if($settings?->whatsapp_url)

                        <a href="{{ $settings->whatsapp_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-white">

                            <i class="fab fa-whatsapp fa-lg"></i>

                        </a>

                    @endif

                </div>

            </div>

        </div>


        <hr>


        <div class="text-center">

            © {{ date('Y') }}

            OneLove Immo.

            Tous droits réservés.

        </div>

    </div>

</footer>