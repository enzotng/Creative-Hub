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

    <main id="profil">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $projet->titre_projet }}</h1>
                    <p>{{ $projet->description_projet }}</p>
                    <p>Date du projet : {{ $projet->date_projet }}</p>
                    <img src="{{ asset('assets/images/png/'.$projet->image_projet) }}" alt="Image projet : {{ $projet->titre_projet }}" class="mb-2">
                </div>
            </div>
        </div>

    </main>
    @include('includes.footer')
</body>

</html>