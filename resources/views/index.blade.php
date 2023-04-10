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

    <!-- <div class="preloader">
        <span class="loader">
            <img class="imgLoader" src="assets/images/ico/logo_blanc.ico" alt="Logo MMI">
        </span>
    </div> -->

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
                <a href="https://www.mmi-velizy.fr/" target="_blank" class="boutonGeneral">En savoir plus <i
                        class="bi bi-arrow-right"></i></a>
            </div>
            <div class="w-full md:w-2/5 p-5 flex justify-center items-end">
                <div class="box_hero"></div>
            </div>
        </section>

        <!-- <div class="projets shadow-md flex flex-col">
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
        </div> -->

        <section class="projetsLatest shadow-md">
            <h1 class="text-3xl font-bold mb-4">Les derniers projets</h1>
            <div class="block">
                <div class="block2">
                    @foreach ($projets->take(1) as $projet)
                    <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}" alt="Image Projet">
                    <a href="{{ route('affichage.projet', ['id_projet' => $projet->id_projet]) }}"
                        title="Accéder au projet">Voir le projet : {{ $projet->titre_projet }}</a>
                    @endforeach
                </div>
                <div class="block3">
                    @foreach ($projets->slice(1, 3) as $projet)
                    <div class="projetDroit">
                        <a href="{{ route('affichage.projet', ['id_projet' => $projet->id_projet]) }}"
                            title="Accéder au projet">
                            <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}" alt="Image Projet">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
    @include('includes.footer')
    <script src="./assets/js/projet.js"></script>
</body>

</html>