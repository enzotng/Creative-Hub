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


        <form class="formulaire" method="POST" action="{{ route('inscription') }}">
            @csrf

            <div>
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="name">Numéro étudiant</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Inscription</button>
            </div>
        </form>

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