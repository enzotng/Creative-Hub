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
            <h1 class="text-center text-3xl font-bold mb-4">Portfolio MMI</h1>
            <div class="flex flex-wrap justify-between">
                @forelse ($projets as $projet)
                <div class="box_mmi">
                    <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}" alt="Image Projet"
                        class="shadow-md">
                    <!-- <p class="text-gray-700 leading-loose">{{ $projet->description_projet }}</p> -->
                </div>
                <a href="" class="block font-bold">{{ $projet->titre_projet }}</a>
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