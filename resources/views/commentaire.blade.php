<form action="{{ route('stored') }}" method="POST">
    @csrf
    <div>
        <label for="text">Votre commentaire :</label>
        <textarea name="contenu_commentaire" id="text" rows="3" required></textarea>
    </div>
    <button type="submit">Poster</button>
</form>