@extends('layout.userLayout')
@section('contenueUser')
<div class="col-md-12">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{asset('storage/'.$article->image)}}" height="600">
        <div class="card-body">
            <h5 class="card-title">Nom : {{ $article->nom }}</h5>
            <p class="card-text">description : {{ $article->description }}</p>
            <p class="card-text">Type : {{ $article->type }}</p>
            <p class="card-text">Statut : {{ $article->statue }}</p>

            <h5 class="card-title">Liste commentaires</h5>
            @foreach($commentaire as $commentaire)
            <div class="row">
                <div class="col-md-8">
                    <p>{{$commentaire->contenu}}</p>
                </div>
                @if (Auth::user())
                @if($commentaire->article_id == Auth::user()->id)
                <div class="col-md-2">
                    <a href="{{'/commentaire/modifier/'.$commentaire->id}}" class="btn btn-primary">
                        <i class="fas fa-exclamation-triangle"></i> Modifier
                    </a>
                </div>
                <div class="col-md-2">
                    <form action="{{'/commentaires/supprimer/'.$commentaire->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
                @endif
                @endif
            </div>
            @endforeach
        </div>

    </div>
</div>
<form action="{{'/ajouterCommentaire/'.$article->id}}" method="post" class="row g-3">
    @csrf
    <div class="input-group">
        <textarea name="contenu" class="form-control" aria-label="With textarea"></textarea>
        <button type="submit" class="btn btn-primary" class="input-group-text">Commenter</button>
    </div>
</form>
@endsection