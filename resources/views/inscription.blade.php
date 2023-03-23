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

    <main id="inscription">

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 flex flex-col my-2">
            <form method="POST" action="{{ route('inscription.store') }}">
                @csrf

                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nom_user">
                                Nom
                            </label>
                            <input id="nom_user" type="text"
                                class="form-control @error('nom_user') is-invalid @enderror" name="nom_user"
                                value="{{ ucfirst(strtolower(old('nom_user'))) }}" required autocomplete="name"
                                autofocus>
                            @error('nom_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-xs mb-2" for="mdp_user">
                                Mot de passe
                            </label>
                            <input id="mdp_user" type="password"
                                class="form-control @error('mdp_user') is-invalid @enderror" name="mdp_user" required
                                autocomplete="new-password">
                            @error('mdp_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-xs mb-2" for="email_user">
                                Adresse email
                            </label>
                            <input id="email_user" type="email"
                                class="form-control @error('email_user') is-invalid @enderror" name="email_user"
                                value="{{ old('email_user') }}" required autocomplete="email">
                            @error('email_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="md:w-1/2 px-3">

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="prenom_user">
                                Prénom
                            </label>
                            <input id="prenom_user" type="text"
                                class="form-control @error('prenom_user') is-invalid @enderror" name="prenom_user"
                                value="{{ ucfirst(strtolower(old('prenom_user'))) }}" required autocomplete="name"
                                autofocus>
                            @error('prenom_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-xs mb-2" for="mdp_user_confirmation">
                                Confirmation du mot de passe
                            </label>
                            <input id="mdp_user_confirmation" type="password" class="form-control"
                                name="mdp_user_confirmation" required autocomplete="new-password">
                            @error('mdp_user_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <span id="password-match-message"></span>
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-xs mb-2" for="role_user">
                                Rôle
                            </label>
                            <input id="role_user" type="text"
                                class="form-control @error('role_user') is-invalid @enderror" name="role_user"
                                value="{{ old('role_user') }}" required>
                            @error('role_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit">
                        S'inscrire
                    </button>
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
    <script src="./assets/js/inscription.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>