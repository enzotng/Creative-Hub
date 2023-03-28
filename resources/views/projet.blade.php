


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $projet->titre_projet }}</h1>
            <p>{{ $projet->description_projet }}</p>
            <img src="{{ $projet->image_projet }}" alt="{{ $projet->titre_projet }}" class="img-fluid">
            <p>Date de publication : {{ $projet->date_projet }}</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">



            <h2>Commentaires</h2>
            @if($projet->commentaires)
            @foreach($projet->commentaires as $commentaire)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">{{ $commentaire->contenu_commentaire }}</p>
                        <p class="card-subtitle text-muted">Publié le {{ $commentaire->date_commentaire }}</p>
                    </div>
                </div>
            @endforeach
            @endif
            <form method="POST" action="{{ route('commentaire.store', $projet->id_projet) }}">
                @csrf
                <div class="form-group">
                    <label for="contenu_commentaire">Ajouter un commentaire</label>
                    <textarea class="form-control" id="contenu_commentaire" name="contenu_commentaire" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>