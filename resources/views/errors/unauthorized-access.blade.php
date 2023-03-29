<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main id="professeurMain">

        <section class="erreurProfesseur">
            <h1>Accès non autorisé</h1>
            <p>Désolé, cette page n'est pas accessible car vous êtes un professeur.</p>
            <a href="/home" class="boutonGeneral">Revenir à l'accueil</a>
        </section>

        @include('includes.footer')

</body>

</html>