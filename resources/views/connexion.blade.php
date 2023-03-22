<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
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

    <main>
        <?php
            if(DB::connection()->getPdo())
                {
                    echo "Connexion réussie";
                    DB::connection()->getDatabaseName();
                }
        ?>

        <section class="connexion">

            <div class="header_connexion">
                <h1>Espace de connexion</h1>
                <a href="admin">Espace administrateur</a>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div>
                    <label for="email_user">{{ __('Adresse e-mail') }}</label>

                    <div>
                        <input id="email_user" type="email" name="email_user" value="{{ old('email_user') }}" required
                            autofocus>
                    </div>
                </div>

                <div>
                    <label for="mdp_user">{{ __('Mot de passe') }}</label>

                    <div>
                        <input id="mdp_user" type="password" name="mdp_user" required>
                    </div>
                </div>

                <div>
                    <div>
                        <button type="submit">
                            {{ __('Connexion') }}
                        </button>
                        <a href="{{ route('inscription.create') }}">Inscription</a>
                    </div>
                </div>
            </form>

        </section>

    </main>
    <footer>
        <div class="reseaux_sociaux">
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-facebook"></i>
        </div>
        <p>© 2023 Creative Hub</p>
    </footer>
    <script src="./assets/js/main.js"></script>
</body>

</html>