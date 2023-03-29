<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main id="portfolio">

        <section class="portfolioSection">
            <div class="headerPortfolio">

                @if (Auth::check())
                <h1>Bonjour, {{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }} !</h1>
                <!-- <form action="{{ route('deconnexion') }}" method="POST">
                    @csrf
                    <button class="boutonGeneral" type="submit">Déconnexion</button>
                </form> -->
                <a href="creationProjet" class="boutonGeneral">Créer un nouveau projet</a>
                @else
                <h1>Travaux MMI</h1>
                <a href="{{ route('connexion') }}" class="boutonGeneral">Se connecter</a>
                @endif
            </div>

            <hr>

            <div class="gridTravaux">
                @if ($projets->isEmpty())
                <p class="mt-5">Vous n'avez encore aucun projets.</p>
                @else
                @foreach ($projets as $projet)
                <div class="travaux">
                    <img src="assets/images/png/{{ $projet->image_projet }}" alt="Image Projet">

                    <hr>
                    <div class="boutonDiv">
                        <a class="boutonGeneral"
                            href="{{ route('affichage.projet', ['id_projet' => $projet->id_projet]) }}">Voir le
                            projet</a>
                        <div class="popup-wrapper">
                            <div class="popup" id="modifierProjetPopup">
                                <h1>Modifier le projet : {{ $projet->titre_projet }}</h1>
                                <form action="{{ route('projets.modifier', ['id' => $projet->id_projet]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="titre_projet">Titre :</label>
                                    <input type="text" name="titre_projet" value="{{ $projet->titre_projet }}">

                                    <label for="image_projet">Image :</label>
                                    <input type="file" name="image_projet">

                                    <label for="description_projet">Description :</label>
                                    <textarea name="description_projet">{{ $projet->description_projet }}</textarea>

                                    <label for="date_projet">Date :</label>
                                    <input type="date" name="date_projet" value="{{ $projet->date_projet }}">

                                    <div class="flex justify-between">
                                        <button type="button" id="cancelBtn" class="boutonGeneral">Annuler</button>
                                        <button type="submit" class="boutonGeneral">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <button class="boutonGeneral" id="btnModifierProjet">Modifier le projet</button>
                        <form action="{{ route('projets.supprimer', ['id' => $projet->id_projet]) }}" method="POST"
                            class="formDelete">
                            @csrf
                            @method('DELETE')
                            <button class="boutonGeneral" type="submit">Supprimer le projet</button>
                        </form>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div id="pagination-container"></div>
        </section>

        <aside class="etudiantAside">
            <h1>Vos compétences</h1>
            <hr>

            <label for="nomDomaine">Choisissez votre domaine</label>
            <div class="select">
                <select name="domaine" id="domaine">
                    <option value="default">Tous les projets</option>
                    <option value="web">Web</option>
                    <option value="communication">Communication</option>
                    <option value="graphisme">Graphisme</option>
                    <option value="audiovisuel">Audiovisuel</option>
                </select>
            </div>

            <label for="nomProgress">Nombre de projets par domaine</label>

            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

        </aside>
    </main>
    @include('includes.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
    <script src="./assets/js/etudiant.js"></script>
    <script src="./assets/js/filtreDomaine.js"></script>
</body>

</html>