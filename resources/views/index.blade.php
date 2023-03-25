<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link rel="icon" type="image/png" href="assets/images/ico/logo_blanc.ico">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main>
        <!-- <section class="hero shadow-md">
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
        </section> -->

        <section class="hero shadow-md flex flex-wrap items-center">
            <div class="w-full md:w-3/5 p-5">
                <h1 class="text-3xl font-bold mb-4">Notre parcours MMI</h1>
                <p class="text-gray-700 leading-loose text-justify">Le département forme en trois ans des
                    professionnel·le·s de la
                    conception et de la réalisation de
                    projets multimédias.
                    Il propose deux parcours :
                    “Création numérique” et “Développement web et dispositifs interactifs.”
                    À la fois créatif·ve·s et compétent.e.s techniquement, les diplômé·e·s de notre département sont
                    polyvalent·e·s dans le domaine des médias, du web et des nouvelles technologies.
                </p>
                <a href="mmi" class="boutonGeneral">En savoir plus</a>
            </div>
            <div class="w-full md:w-2/5 p-5 flex justify-center items-end">
                <div class="box_hero"></div>
            </div>
        </section>

        <div class="projets shadow-md">
            <div class="projets_box">
                <img src="assets/images/jpg/pexels-guillaume-meurice-2808402.jpg" alt="">
                <a href="">SAE Darknet</a>
            </div>
            <div class="projets_box">
                <img src="assets/images/jpg/pexels-guillaume-meurice-2808402.jpg" alt="">
                <a href="">SAE Darknet</a>
            </div>
            <div class="projets_box">
                <img src="assets/images/jpg/pexels-guillaume-meurice-2808402.jpg" alt="">
                <a href="">SAE Darknet</a>
            </div>
            <div class="projets_box">
                <img src="assets/images/jpg/pexels-guillaume-meurice-2808402.jpg" alt="">
                <a href="">SAE Darknet</a>
            </div>
        </div>

    </main>
    @include('includes.footer')
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="./assets/js/projet.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>