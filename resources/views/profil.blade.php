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
        <a href="home"><img src="assets/images/ico/logo_blanc.ico" alt="Logo CreativeHub"></a>
        <nav>
            <ul>
                <li><a href="#"><i class="bi bi-search"></i></a></li>
                <span>|</span>
                <li><a href="connexion"><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </nav>
        <div class="search-overlay">
            <form action="#" method="get">
                <input type="text" name="search" placeholder="Recherche...">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Profil de {{ $user->prenom_user }} {{ $user->nom_user }}</h1>

            <ul>
                <li><strong>Nom :</strong> {{ $user->nom_user }}</li>
                <li><strong>Prénom :</strong> {{ $user->prenom_user }}</li>
                <li><strong>Email :</strong> {{ $user->email_user }}</li>
                <li><strong>Role :</strong> {{ $user->role_user }}</li>
            </ul>
        </div>

        <a href="{{ route('etudiant') }}">Voir mes projets</a>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
    <script src="./assets/js/etudiant.js"></script>
</body>

</html>