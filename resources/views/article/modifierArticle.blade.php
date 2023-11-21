@extends('layout.userLayout')
@section('contenueUser')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/articleModif/{{ $article->id }}">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nom</label><br>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom" value="{{$article->nom}}">
            </div>
        </div>
        <div class="input-group">
            <label class="col-sm-5 col-form-label">Description</label>
            <br>
            <textarea name="description" class="form-control" aria-label="With textarea" {{$article->description}}></textarea>

        </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Image</label><br>
            <div class="col-sm-10">
                <input type="file" name="image" value="{{$article->image}}"   class="form-control"><br>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Type</label>
            <div class="col-sm-10">
                <select name="type" class="form-select">
                    <option value="terrain" {{$article->type == 'terrain' ? 'selected' : ''}}>Terrain</option>
                    <option value="maison" {{$article->type == 'maison' ? 'selected' : ''}}>Maison</option>
                    <option value="studio" {{$article->type == 'studio' ? 'selected' : ''}}>Studio</option>
                    <option value="duplex" {{$article->type == 'duplex' ? 'selected' : ''}}>Duplex</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Statut</label>
            <div class="col-sm-10">
                <select name="statut" class="form-select">

                    <option value="occupe" {{$article->statue == 'occupe' ? 'selected' : ''}}  >Occupé</option>
                    <option value="libre" {{$article->statue == 'libre' ? 'selected' : ''}}>Libre</option>     
                </select>
            </div>
        </div>
        <div class="input-group">
        <input type="submit" class="btn btn-secondary" value="Mettre à jour">
    </form>
@endsection
