<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('store') }}">
    @csrf

    <div class="form-group">
        <label for="titre_projet">Titre du projet</label>
        <input type="text" name="titre_projet" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image_projet">Image du projet</label>
        <input type="file" name="image_projet" class="form-control-file" required>
    </div>

    <div class="form-group">
        <label for="description_projet">Description du projet</label>
        <textarea name="description_projet" class="form-control" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="date_projet">Date du projet</label>
        <input type="date" name="date_projet" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
</body>
</html>

