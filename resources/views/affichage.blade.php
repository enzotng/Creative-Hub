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

            <div class="infos_projet">
                <p><i class="bi bi-calendar"></i>Date du projet : {{ $projet->date_projet }}</p>
                <p><i class="bi bi-gear-fill"></i>Domaine du projet : {{ $projet->domaine_projet }}</p>
                <p><i class="bi bi-star-fill"></i>Note du projet : {{ $projet->note_projet }} / 20</p>
                <p><i class="bi bi-bookmark-fill"></i>Compétence du projet :
                    @foreach($projet->competences as $competence)
                    {{ $competence->nom_competence }}
                    @endforeach
                </p>

                <p><i class="bi bi-pencil-square"></i> Apprentissage critique :
                    @foreach($projet->apprentissagesCritiques as $ac)
                    {{ $ac->nom_ac }}
                    @endforeach
                </p>
            </div>


            <div class="description_projet">
                <p><i class="bi bi-card-text"></i>Description du projet : {{ $projet->description_projet }}</p>
            </div>

            <hr>

            <form method="POST" action="{{ route('commentaire.projet', $projet->id_projet) }}"
                class="formulaireCommentaire">
                @csrf
                <div class="mb-4">
                    <label for="contenu_commentaire" class="input_label text-xl">Laissez un commentaire</label>
                    <textarea name="contenu_commentaire" id="message" rows="3" class="input_field"
                        placeholder="Votre commentaire..."></textarea>
                </div>
                <button type="submit" class="boutonGeneral">Envoyer <i class="bi bi-arrow-right"></i></button>
            </form>

            @if($commentaires->count() > 0)
            <div class="commentaireDiv">
                <h2 class="text-xl">Tous les commentaires</h2>
                @foreach($commentaires as $commentaire)
                <div class="commentaire">
                    <div class="headerCommentaire">
                        <img src="{{ asset('assets/images/png/' . $commentaire->utilisateur->img_user) }}"
                            alt="Photo {{ $commentaire->utilisateur->prenom_user }} {{ $commentaire->utilisateur->nom_user }}">
                        <p class="mb-2 commentaireProjet"><strong>{{ $commentaire->utilisateur->prenom_user }}</strong> -
                            {{ $commentaire->date_commentaire }}</p>
                    </div>
                    <hr>
                    <p class="commentaireProjet">{{ $commentaire->contenu_commentaire }}</p>
                </div>
                @endforeach
            </div>
            @else
            <p>Aucun commentaire n'a été rédigé pour ce projet</p>
            @endif

        </section>
    </main>

    @include('includes.footer')
</body>

</html>