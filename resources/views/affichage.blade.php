<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - {{ $projet->titre_projet }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/ico/logo_blanc.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    @include('includes.header')

    <main id="profil" class="mt-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center">
                <div class="w-full max-w-md bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h1 class="text-3xl font-bold mb-2">{{ $projet->titre_projet }}</h1>
                        <p class="text-gray-600 text-lg mb-2">{{ $projet->description_projet }}</p>
                        <p class="text-gray-600 text-lg mb-4">Date du projet : {{ $projet->date_projet }}</p>
                        <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}"
                            alt="Image projet : {{ $projet->titre_projet }}" class="mb-4 w-full">
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 py-12">
            <div class="max-w-lg mx-auto">
                <form class="p-4 rounded-md shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Laissez un commentaire</h2>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nom</label>
                        <input type="text" name="name" id="name"
                            class="form-input w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-bold mb-2">Commentaire</label>
                        <textarea name="message" id="message" rows="3"
                            class="form-textarea w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Envoyer</button>
                    </div>
                </form>

                <hr class="my-6">

                <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
                <form action="#" method="POST" class="mb-4">
                    @csrf
                    <textarea name="commentaire" rows="3" placeholder="Votre commentaire" class="w-full border-2 border-gray-300 p-2 rounded-lg"></textarea>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Ajouter un commentaire</button>
                </form>

                <div class="mb-4">
                    <div class="bg-gray-200 p-4 rounded-lg">
                        <p class="mb-2"><strong>Jean Dupont</strong> - 10/05/2022</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis, dui sed posuere cursus, nulla nunc pretium massa, eget posuere purus dolor a risus.</p>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="bg-gray-200 p-4 rounded-lg">
                        <p class="mb-2"><strong>Pierre Martin</strong> - 05/03/2022</p>
                        <p>Etiam tincidunt rhoncus ex, a scelerisque massa aliquam in. Maecenas ac nibh quis tellus pulvinar consectetur eget a lorem.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('includes.footer')
</body>

</html>