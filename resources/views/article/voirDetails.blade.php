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
        </div>
    </div>
</div>
<form action="" method="post" class="row g-3">
    <div class="input-group">
        <textarea class="form-control" aria-label="With textarea"></textarea>
        <button type="submit" class="btn btn-primary" class="input-group-text">Commenter</button>
    </div>
</form>
@endsection