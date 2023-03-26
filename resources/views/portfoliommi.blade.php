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

    <main>
        <section class="projets">
            <h1 class="text-center text-3xl font-bold mb-4">Portfolio MMI</h1>
            <div class="flex flex-wrap justify-center">
                @forelse ($projets as $projet)
                <div class="projets_box w-full md:w-1/2 lg:w-1/3 mb-4 px-2">
                    <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}" alt="Image Projet" class="mb-2">
                    <a href="" class="block font-bold">{{ $projet->titre_projet }}</a>
                    <!-- <p class="text-gray-700 leading-loose">{{ $projet->description_projet }}</p> -->
                </div>
                @empty
                <p class="text-center">Il n'y a pas de projets pour le moment.</p>
                @endforelse
            </div>
        </section>
    </main>

    @include('includes.footer')
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="./assets/js/projet.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>
