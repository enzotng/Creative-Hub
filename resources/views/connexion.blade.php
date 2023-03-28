<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link rel="icon" type="image/png" href="assets/images/ico/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main id="connexion">

        <form method="POST" action="{{ route('login') }}" class="form_container bg-white shadow-md px-8 pt-6 pb-8 flex flex-col my-2">
            @csrf

            <div class="title_container">
                <p class="title">Connexion à votre compte</p>
                <span class="subtitle">Connectez-vous pour utiliser notre application et profiter de toutes ses
                    fonctionnalités.</span>
            </div>

            <div class="input_container mb-4">
                <label class="input_label" for="email_user">Adresse email</label>
                <div class="relative">
                    <i class="bi bi-envelope icon text-gray-400 hover:text-gray-500"></i>
                    <input id="email_user" type="email" class="input_field @error('email_user') is-invalid @enderror"
                        name="email_user" value="{{ old('email_user') }}"
                        oninput="this.value = this.value.toLowerCase()" required autofocus>
                    @error('email_user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="input_container mb-4">
                <label class="input_label" for="mdp_user">Mot de passe</label>
                <div class="relative">
                    <i class="bi bi-lock icon text-gray-400 hover:text-gray-500"></i>
                    <input id="mdp_user" type="password" name="mdp_user"
                        class="input_field @error('mdp_user') is-invalid @enderror" required>
                    <button class="btn-toggle-password toggle-password absolute top-0 right-0 mr-3 mt-3" type="button">
                        <i class="bi bi-eye-slash text-gray-400 hover:text-gray-500"></i>
                    </button>
                    @error('mdp_user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button title="Connexion" type="submit" class="boutonGeneral">
                <span>Se connecter</span>
            </button>

            <div class="separateur">
                <hr class="hr">
                <span>Ou</span>
                <hr class="hr">
            </div>

            <a title="Inscription" href="{{ route('inscription.create') }}" class="boutonGeneral">S'inscrire</a>

            <p class="note">
                En soumettant ce formulaire, vous acceptez nos conditions d'utilisation et notre
                politique de confidentialité.
            </p>

            <a href="conditions" class="conditions">Politique de confidentialité et conditions d'utilisation</a>

        </form>

    </main>
    @include('includes.footer')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="./assets/js/connexion.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>