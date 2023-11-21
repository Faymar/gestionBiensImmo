@extends('layout.userLayout')
@section('contenueUser')

<form method="POST" action="/articleSupprimer/{{ $article->id }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
@endsection