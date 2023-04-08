<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link rel="icon" type="image/png" href="assets/images/ico/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main id="projets">
        <form method="POST" action="{{ route('store') }}"
            class="form_container bg-white shadow-md px-8 pt-6 pb-8 flex flex-col my-2" enctype="multipart/form-data">
            @csrf

            <div class="title_container">
                <p class="title">Ajouter un nouveau projet</p>
                <span class="subtitle">Remplissez tous les champs ci-dessous pour créer un nouveau projet.</span>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="input_container mb-4">
                        <label class="input_label" for="titre_projet">Titre du projet</label>
                        <div class="relative">
                            <i class="bi bi-file-font-fill icon text-gray-400 hover:text-gray-500"></i>
                            <input type="text" name="titre_projet" class="input_field" required>
                        </div>
                    </div>

                    <div class="input_container mb-4">
                        <label class="input_label" for="image_projet">Image du projet</label>
                        <div class="relative">
                            <i class="bi bi-image-fill icon text-gray-400 hover:text-gray-500"></i>
                            <input type="file" name="image_projet" class="input_field" accept="image/*" required>
                        </div>
                    </div>

                    <div class="input_container mb-4">
                        <label class="input_label" for="description_projet">Description du projet</label>
                        <textarea name="description_projet" class="input_textarea" rows="3"
                            placeholder="Écrivez la description du projet..." required></textarea>
                    </div>

                </div>

                <div class="md:w-1/2 px-3">

                    <div class="input_container mb-4">
                        <label class="input_label" for="date_projet">Date du projet</label>
                        <div class="relative">
                            <i class="bi bi-calendar-event icon text-gray-400 hover:text-gray-500"></i>
                            <input type="date" name="date_projet" class="input_field"
                                value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>

                    <div class="input_container mb-4">
                        <label for="competence">Compétence :</label>
                        <div class="relative">
                            <i class="bi bi-book icon text-gray-400 hover:text-gray-500"></i>
                            <select name="competence" id="competence">
                                <option value="">Sélectionner une compétence</option>
                                @foreach($competences as $competence)
                                <option value="{{ $competence->id_competence }}">{{ $competence->nom_competence }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <label for="ac">Apprentissage critique :</label>
                        <div class="relative">
                            <i class="bi bi-lightbulb icon text-gray-400 hover:text-gray-500"></i>
                            <select name="ac" id="ac">
                                <option value="">Sélectionner une compétence d'abord</option>
                            </select>
                        </div>

                        <label class="input_label" for="note_projet">Note sur 20</label>
                        <div class="relative">
                            <i class="bi bi-star-fill icon text-gray-400 hover:text-gray-500"></i>
                            <input type="number" name="note_projet" class="input_field" min="0" max="20" step="1"
                                placeholder="Exemple : 10/20" required>
                        </div>

                    </div>

                </div>

            </div>

            <label class="input_label" for="domaine_projet">Domaine du projet</label>
            <div class="radio-inputs">
                <label>
                    <input class="radio-input" type="radio" name="domaine_projet" value="Web" required>
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-globe2"></i>
                        </span>
                        <span class="radio-label">Web</span>
                    </span>
                </label>
                <label>
                    <input class="radio-input" type="radio" name="domaine_projet" value="Communication" required>
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-chat-right"></i>
                        </span>
                        <span class="radio-label">Communication</span>
                    </span>
                </label>
                <label>
                    <input class="radio-input" type="radio" name="domaine_projet" value="Audiovisuel" required>
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-camera-video-fill"></i>
                        </span>
                        <span class="radio-label">Audiovisuel</span>
                    </span>
                </label>
                <label>
                    <input class="radio-input" type="radio" name="domaine_projet" value="Graphisme" required>
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-palette-fill"></i>
                        </span>
                        <span class="radio-label">Graphisme</span>
                    </span>
                </label>
            </div>

            <button type="submit" class="boutonGeneral">Enregistrer</button>
        </form>
    </main>
    @include('includes.footer')
    <script src="./assets/js/searchbar.js"></script>
    <script src="./assets/js/selectCompetence.js"></script>
</body>

</html>