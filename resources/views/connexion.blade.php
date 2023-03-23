<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <p>Creative Hub</p>
        <nav>
            <ul>
                <li><a href=""><i class="bi bi-search"></i></a></li>
                <span>|</span>
                <li><a href=""><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </nav>
    </header>

    <main id="connexion">

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 flex flex-col my-2">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email_user">
                        {{ __('Adresse e-mail') }}
                    </label>
                    <input id="email_user" type="email" class="form-control @error('email_user') is-invalid @enderror"
                        name="email_user" value="{{ old('email_user') }}" required autofocus>
                    @error('email_user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block uppercase tracking-wide text-xs mb-2" for="mdp_user">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <input id="mdp_user" type="password" name="mdp_user"
                            class="form-control @error('mdp_user') is-invalid @enderror" required>
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

                <div class="flex justify-end">
                    <div>
                        <button type="submit">
                            {{ __('Connexion') }}
                        </button>
                        <!-- <a href="{{ route('inscription.create') }}">Inscription</a> -->
                    </div>
                </div>

            </form>
        </div>

    </main>
    <footer>
        <div class="reseaux_sociaux">
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-facebook"></i>
        </div>
        <p>© 2023 Creative Hub</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="./assets/js/connexion.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>