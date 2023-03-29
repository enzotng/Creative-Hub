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

        <section class="profil bg-white shadow-md">
            <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data"
                class="form_container flex flex-col my-2">
                @csrf
                @method('PUT')

                <div class="header_profil">
                    <div class="title_container">
                        <p class="title">Vos informations personnelles : {{ $user->prenom_user }} {{ $user->nom_user }}
                        </p>
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
                                <input id="nom_user" type="text"
                                    class="input_field @error('nom_user') is-invalid @enderror" name="nom_user"
                                    value="{{ $user->nom_user }}" autocomplete="name" autofocus disabled>
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
                                    value="{{ $user->prenom_user }}" autocomplete="name" autofocus disabled>
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
                                    value="{{ $user->email_user }}" oninput="this.value = this.value.toLowerCase()"
                                    autocomplete="email" disabled>
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
                                    class="input_field @error('mdp_user') is-invalid @enderror" name="mdp_user"
                                    autocomplete="new-password" disabled value="{{ $user->mdp_user }}">
                                @error('mdp_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="input_container mb-4">
                        <label class="input_label" for="role_user">
                            Rôle (par défaut)
                        </label>
                        <div class="relative">
                            <i class="bi bi-person-circle icon text-gray-400 hover:text-gray-500"></i>
                            <input id="role_user" type="text"
                                class="input_field @error('role_user') is-invalid @enderror" disabled placeholder="User"
                                name="role_user" value="{{ $user->role_user }}"
                                title="Contactez un administrateur pour changer votre rôle">
                            @error('role_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> -->

                        <div class="input_container mb-4">
                            <label class="input_label" for="img_user">
                                Avatar
                            </label>
                            <div class="relative">
                                <i class="bi bi-download icon text-gray-400 hover:text-gray-500"></i>
                                <input id="img_user" type="file"
                                    class="input_field @error('img_user') is-invalid @enderror" name="img_user"
                                    value="{{ $user->img_user }}" accept="image/*" disabled>
                                @error('img_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <button class="boutonGeneral" id="valider-btn" style="display:none;">
                    Valider les modifications
                </button>

            </form>

            <button class="boutonGeneral" id="modifier-btn" onclick="activerInputs()">
                    Modifier mes informations personnelles
                </button>
        </section>
    </main>
    @include('includes.footer')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <!-- <script src="./assets/js/profil.js"></script> -->
    <script>
    function activerInputs() {
        document.querySelectorAll('.input_field').forEach(function(input) {
            input.removeAttribute('disabled');
        });
        document.querySelector('#valider-btn').style.display = 'inline-block';
        document.querySelector('#modifier-btn').style.display = 'none';
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="./assets/js/searchbar.js"></script>
</body>

</html>