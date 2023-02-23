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
                <li><a href="connexion"><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero_1">
                <div class="sous_hero_1">
                    <h1>Latest project</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="hero_2">
                <div class="sous_hero_1_1">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="sous_hero_2">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="sous_hero_2">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="sous_hero_1_1">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </section>

        <section class="projets">
            <div class="arrow_gauche"><i class="bi bi-arrow-left"></i></div>
            <div class="arrow_droite"><i class="bi bi-arrow-right"></i></div>
            <div class="projets_section">
                <div class="projets_1"></div>
                <div class="projets_2"></div>
                <div class="projets_1"></div>
                <div class="projets_2"></div>
            </div>
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