@extends('layout.userLayout')
@section('contenueUser')

<form action="{{'/commentaireModifier/'.$commentaire->id}}" method="post" class="row g-3">
    @method('patch')
    @csrf
    <div class="input-group">
        <textarea name="contenu" class="form-control" aria-label="With textarea">{{$commentaire->contenu}}</textarea>
        <button type="submit" class="btn btn-primary" class="input-group-text">Commenter</button>
    </div>
</form>
@endsection