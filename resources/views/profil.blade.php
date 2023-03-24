<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main id="profil">

        <form method="POST" action="{{ route('inscription.store') }}"
            class="form_container bg-white shadow-md px-8 pt-6 pb-8 flex flex-col my-2">
            @csrf

            <div class="header_profil">
                <div class="title_container">
                    <p class="title">Vos informations personnelles : {{ $user->prenom_user }} {{ $user->nom_user }}</p>
                </div>
                <a href="{{ route('etudiant') }}">Voir mes projets</a>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="input_container mb-4">
                        <label class="input_label" for="nom_user">
                            Nom
                        </label>
                        <div class="relative">
                            <i class="bi bi-person icon text-gray-400 hover:text-gray-500"></i>
                            <input id="nom_user" type="text" class="input_field @error('nom_user') is-invalid @enderror"
                                name="nom_user" value="{{ $user->nom_user }}" required autocomplete="name" autofocus>
                            @error('nom_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input_container mb-4">
                        <label class="input_label" for="prenom_user">
                            Prénom
                        </label>
                        <div class="relative">
                            <i class="bi bi-person icon text-gray-400 hover:text-gray-500"></i>
                            <input id="prenom_user" type="text"
                                class="input_field @error('prenom_user') is-invalid @enderror" name="prenom_user"
                                value="{{ $user->prenom_user }}" required autocomplete="name" autofocus>
                            @error('prenom_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input_container mb-4">
                        <label class="input_label" for="email_user">
                            Adresse email
                        </label>
                        <div class="relative">
                            <i class="bi bi-envelope icon text-gray-400 hover:text-gray-500"></i>
                            <input id="email_user" type="email"
                                class="input_field @error('email_user') is-invalid @enderror" name="email_user"
                                value="{{ $user->email_user }}" oninput="this.value = this.value.toLowerCase()" required
                                autocomplete="email">
                            @error('email_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 px-3">

                    <div class="input_container mb-4">
                        <label class="input_label" for="mdp_user">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <i class="bi bi-lock icon text-gray-400 hover:text-gray-500"></i>
                            <input id="mdp_user" type="password"
                                class="input_field @error('mdp_user') is-invalid @enderror" name="mdp_user" required
                                autocomplete="new-password">
                            <button class="btn-toggle-password toggle-password absolute top-0 right-0 mr-3 mt-3"
                                type="button">
                                <i class="bi bi-eye-slash text-gray-400 hover:text-gray-500"></i>
                            </button>
                            @error('mdp_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input_container mb-4">
                        <label class="input_label" for="mdp_user_confirmation">
                            Confirmation du mot de passe
                        </label>
                        <div class="relative">
                            <i class="bi bi-lock icon text-gray-400 hover:text-gray-500"></i>
                            <input id="mdp_user_confirmation" type="password" class="input_field"
                                name="mdp_user_confirmation" required autocomplete="new-password">
                            <button class="btn-toggle-password toggle-password2 absolute top-0 right-0 mr-3 mt-3"
                                type="button">
                                <i class="bi bi-eye-slash text-gray-400 hover:text-gray-500"></i>
                            </button>
                            @error('mdp_user_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <span id="password-match-message"></span>
                    </div>

                    <div class="input_container mb-4">
                        <label class="input_label" for="role_user">
                            Rôle (par défaut)
                        </label>
                        <div class="relative">
                            <i class="bi bi-person-circle icon text-gray-400 hover:text-gray-500"></i>
                            <input id="role_user" type="text"
                                class="input_field @error('role_user') is-invalid @enderror" disabled placeholder="User"
                                name="role_user" value="{{ $user->role_user }}" required>
                            @error('role_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="boutonGeneral">
                Modifier mes informations personnelles
            </button>

        </form>

    </main>
    @include('includes.footer')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
</body>

</html>