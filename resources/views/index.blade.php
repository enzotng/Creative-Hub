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

    <div class="preloader">
        <span class="loader">
            <img class="imgLoader" src="assets/images/ico/logo_blanc.ico" alt="Logo MMI">
        </span>
    </div>

    <main>

        <section class="hero shadow-md flex flex-wrap items-center">
            <div class="w-full md:w-3/5 p-5 flex-col justify-between items-stretch">
                <h1 class="text-3xl font-bold mb-4">Notre parcours MMI</h1>
                <p class="leading-loose text-justify">Le département forme en trois ans des
                    professionnel·le·s de la
                    conception et de la réalisation de
                    projets multimédias.
                    Il propose deux parcours :
                    “Création numérique” et “Développement web et dispositifs interactifs.”
                    À la fois créatif·ve·s et compétent.e.s techniquement, les diplômé·e·s de notre département sont
                    polyvalent·e·s dans le domaine des médias, du web et des nouvelles technologies.
                </p>
                <br>
                <p class="leading-loose text-justify">La SAE403 MMI2 consiste en la réalisation d'un site complexe pour
                    le portfolio, mettant en œuvre des
                    utilisateurs ayant des droits différents, tels que les utilisateurs non authentifiés, les étudiants,
                    les professeurs et les administrateurs. Les étudiants doivent pouvoir renseigner et visualiser leur
                    propre portfolio personnel, les professeurs peuvent consulter les différents portfolios, et les
                    administrateurs peuvent modifier tous les aspects, y compris le libellé des apprentissages
                    critiques.

                </p>
                <a href="https://www.mmi-velizy.fr/" target="_blank" class="boutonGeneral">En savoir plus</a>
            </div>
            <div class="w-full md:w-2/5 p-5 flex justify-center items-end">
                <div class="box_hero"></div>
            </div>
        </section>

        <div class="projets shadow-md flex flex-col">
            <h1 class="text-3xl font-bold mb-4">Les derniers projets</h1>
            @php
            $projets = \App\Models\Projet::latest()->take(4)->get();
            @endphp
            @if ($projets->count() > 0)
            <div class="w-full flex flex-wrap">
                @foreach ($projets as $projet)
                <div class="projets_box flex flex-col items-center flex-grow mb-4 mr-4">
                    <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}" alt="Image Projet" class="mb-2">
                    <a href="{{ route('affichage.projet', ['id_projet' => $projet->id_projet]) }}"
                        title="Accéder au projet">{{ $projet->titre_projet }}</a>
                </div>
                @endforeach
            </div>
            @else
            <p>Aucun élève n'a encore créé de projets.</p>
            @endif
        </div>

    </main>
    @include('includes.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="./assets/js/projet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js"
        integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/js/recherche.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/searchbar.js"></script>
</body>

</html>