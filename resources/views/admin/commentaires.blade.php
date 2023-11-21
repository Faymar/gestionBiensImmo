@extends('layout.adminLayout')
@section('contenueAdmin')
@foreach($commentaire as $commentaire)
<div class="row">
    <div class="col-md-8">
        <p>{{$commentaire->contenu}}</p>
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
</div>
@endforeach
@endsection