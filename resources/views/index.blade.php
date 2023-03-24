<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main>
        <section class="hero">
            <div class="hero_1">
                <div class="sous_hero_1">
                    <h1>Notre parcours MMI</h1>
                    <p>Le département forme en trois ans des professionnel·le·s de la conception et de la réalisation de
                        projets multimédias.
                        Il propose deux parcours :
                        “Création numérique” et “Développement web et dispositifs interactifs.”
                        À la fois créatif·ve·s et compétent.e.s techniquement, les diplômé·e·s de notre département sont
                        polyvalent·e·s dans le domaine des médias, du web et des nouvelles technologies.
                    </p>
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
                <div class="projets_item">
                    <div class="projets_1"></div>
                </div>
                <div class="projets_item">
                    <div class="projets_2"></div>
                </div>
                <div class="projets_item">
                    <div class="projets_1"></div>
                </div>
                <div class="projets_item">
                    <div class="projets_2"></div>
                </div>
            </div>
        </section>

    </main>
    @include('includes.footer')
    <script src="./assets/js/main.js"></script>
</body>

</html>