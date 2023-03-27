<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio MMI</title>
    <link rel="icon" type="image/png" href="assets/images/ico/logo_blanc.ico">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main id="portfolioMMI">
        <section class="sectionMMI bg-white shadow-md flex flex-col my-2">
            <h1 class="mb-4">Portfolio MMI</h1>
            <div class="flex flex-wrap justify-between">
                @forelse ($projets as $projet)
                <div class="box_mmi shadow-md">
                    <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}" alt="Image Projet">
                    <a href="" class="titre_projet"><b class="font-bold">Titre du projet :
                        </b>{{ $projet->titre_projet }}</a>
                    <p><b class="font-bold">Description du projet : </b>{{ $projet->description_projet }} [...]</p>
                    <a href="" class="lire_projet">Lire la suite <svg width="34" height="34" viewBox="0 0 74 74"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                            <path
                                d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z"
                                fill="white"></path>
                        </svg></a>
                    </a>
                </div>
                @empty
                <p class="text-center">Il n'y a pas de projets pour le moment.</p>
                @endforelse
            </div>
        </section>
    </main>

    @include('includes.footer')
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="./assets/js/portfoliommi.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>