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

                </div>

                <div class="md:w-1/2 px-3">
                    <div class="input_container mb-4">
                        <label class="input_label" for="description_projet">Description du projet</label>
                        <div class="relative">
                            <i class="bi bi-card-text icon text-gray-400 hover:text-gray-500"></i>
                            <textarea name="description_projet" class="input_field" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="input_container mb-4">
                        <label class="input_label" for="date_projet">Date du projet</label>
                        <div class="relative">
                            <i class="bi bi-calendar-event icon text-gray-400 hover:text-gray-500"></i>
                            <input type="date" name="date_projet" class="input_field"
                                value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <label class="input_label" for="domaine_projet">Domaine du projet</label>
            <div class="radio-inputs">
                <label>
                    <input class="radio-input" type="radio" name="domaine" value="Développer">
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-code-slash"></i>
                        </span>
                        <span class="radio-label">Développer</span>
                    </span>
                </label>
                <label>
                    <input class="radio-input" type="radio" name="domaine" value="Concevoir">
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-pencil"></i>
                        </span>
                        <span class="radio-label">Concevoir</span>
                    </span>
                </label>
                <label>
                    <input class="radio-input" type="radio" name="domaine" value="Entreprendre">
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-briefcase-fill"></i>
                        </span>
                        <span class="radio-label">Entreprendre</span>
                    </span>
                </label>
                <label>
                    <input class="radio-input" type="radio" name="domaine" value="Exprimer">
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-megaphone-fill"></i>
                        </span>
                        <span class="radio-label">Exprimer</span>
                    </span>
                </label>
                <label>
                    <input class="radio-input" type="radio" name="domaine" value="Comprendre">
                    <span class="radio-tile">
                        <span class="radio-icon">
                            <i class="bi bi-book-half"></i>
                        </span>
                        <span class="radio-label">Comprendre</span>
                    </span>
                </label>
            </div>

            <button type="submit" class="boutonGeneral">Enregistrer</button>
        </form>
    </main>
    @include('includes.footer')
</body>

</html>