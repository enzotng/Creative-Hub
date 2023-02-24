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

            <form method="POST" action="{{ route('connexion') }}">
                @csrf

                <div>
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

                </div>

                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                </div>

                <div>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>

                <div>
                    <button type="submit">Connexion</button>
                </div><br>
                @error('email')
                <span>{{ $message }}</span>
                @enderror
                @error('password')
                <span>{{ $message }}</span>
                @enderror

                <a href="inscription">Pas encore de compte ?</a>
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