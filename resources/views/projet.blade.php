<form method="POST" action="{{ route('projet.add') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="titre_projet">Titre du projet :</label>
        <input type="text" name="titre_projet" id="titre_projet" class="form-control">
    </div>

    <div class="form-group">
        <label for="image_projet">Image du projet :</label>
        <input type="file" name="image_projet" id="image_projet" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter un projet</button>
</form>