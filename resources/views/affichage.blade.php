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

    <main id="affichageProjet">
        <section class="affichageSection shadow-md">
            <h1 class="text-3xl font-bold mb-2">Titre du projet : {{ $projet->titre_projet }}</h1>
            <hr>

            <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}"
                alt="Image projet : {{ $projet->titre_projet }}">

            <p><i class="bi bi-card-text"></i>Description du projet : {{ $projet->description_projet }}</p>
            <p><i class="bi bi-calendar"></i>Date du projet : {{ $projet->date_projet }}</p>

            <form method="POST" action="{{ route('commentaire.projet', $projet->id_projet) }}" class="formulaireCommentaire">
                @csrf
                <div class="mb-4">
                    <label for="contenu_commentaire" class="input_label text-xl">Laissez un commentaire</label>
                    <textarea name="contenu_commentaire" id="message" rows="3" class="input_field" placeholder="Votre commentaire..."></textarea>
                </div>
                <button type="submit" class="boutonGeneral">Envoyer</button>
            </form>

            <div class="commentaireDiv">
                <h2 class="text-xl">Tous les commentaires</h2>

                <div class="commentaire">
                    <div class="headerCommentaire">
                        <img src="{{ asset('assets/images/png/' . Auth::user()->img_user) }}"
                            alt="Photo {{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }}">
                        <p class="mb-2"><strong>Jean Dupont</strong> - 10/05/2022</p>
                    </div>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis, dui sed posuere
                        cursus, nulla nunc pretium massa, eget posuere purus dolor a risus.</p>
                </div>
            </div>
        </section>
    </main>

    @include('includes.footer')
</body>

</html>