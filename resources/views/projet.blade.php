<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>
    
    <h2>{{ $projet->titre }}</h2>
    <img src="{{ $projet->image_projet }}" alt="{{ $projet->titre_projet }}">
    <p>{{ $projet->description_projet }}</p>
    <p>{{ $projet->date_projet }}</p>
    
<!-- <form action="{{ route('stored') }}" method="POST">
    @csrf
    <div>
        <label for="text">Votre commentaire :</label>
        <textarea name="contenu_commentaire" id="text" rows="3" required></textarea>
    </div>
    <button type="submit">Poster</button>
</form> -->
    <footer></footer>
</body>
</html>
