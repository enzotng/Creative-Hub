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

    <main id="profil">

        <section class="profil bg-white shadow-md admin">
            <div class="headerPortfolio mb-4">
                <h1>Bonjour, test !</h1>
            </div>
            <hr>

            <div class="gridTravaux">
                <div class="travaux">
                    <hr class="mb-4">
                    <div class="boutonDiv">
                        <div class="popup-wrapper">
                            <div class="popup mb-5">
                                <h1 class="mb-4">Utilisateurs :</h1>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <label for="titre_projet" class="mr-2">Sélectionnez un utilisateur :</label>
                                    <div class="select mr-4">
                                        <select name="domaine" id="domaine">
                                            <option value="default">-- selectionnez --</option>
                                            <option value="web">Web</option>
                                            <option value="communication">Communication</option>
                                            <option value="graphisme">Graphisme</option>
                                            <option value="audiovisuel">Audiovisuel</option>
                                        </select>
                                    </div>
                                    <button class="boutonGeneral mr-4">
                                        Modifier
                                    </button>
                                    <button class="boutonGeneral">
                                        supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="popup-wrapper">
                            <div class="popup">
                                <h1 class="mb-4">Projet :</h1>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <label for="titre_projet" class="mr-2">Sélectionnez un projet :</label>
                                    <div class="select mr-4">
                                        <select name="domaine" id="domaine">
                                            <option value="default">-- selectionnez --</option>
                                            <option value="web">Web</option>
                                            <option value="communication">Communication</option>
                                            <option value="graphisme">Graphisme</option>
                                            <option value="audiovisuel">Audiovisuel</option>
                                        </select>
                                    </div>
                                    <button class="boutonGeneral mr-4">
                                        Modifier
                                    </button>
                                    <button class="boutonGeneral">
                                        supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="popup-wrapper">
            <div class="popup" id="modifierProjetPopup">
                <h1>Modifier le projet : </h1>
                <form action=""
                    method="POST" enctype="multipart/form-data">
                    <label for="titre_projet">Titre :</label>
                    <input type="text" name="titre_projet" value="">

                    <label for="image_projet">Image :</label>
                    <input type="file" name="image_projet">

                    <label for="description_projet">Description :</label>
                    <textarea name="description_projet"></textarea>

                    <label for="date_projet">Date :</label>
                    <input type="date" name="date_projet" value="">

                    <div class="flex justify-between">
                        <button type="button" id="cancelBtn" class="boutonGeneral">Annuler</button>
                        <button type="submit" class="boutonGeneral">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
        
    </main>
    @include('includes.footer')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <!-- <script src="./assets/js/profil.js"></script> -->
</body>

</html>