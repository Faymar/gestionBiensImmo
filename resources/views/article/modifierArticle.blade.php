@extends('layout.adminLayout')
@section('contenueAdmin')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ajouter Articles</h5>
        <form method="POST" action="/admin/articleModif/{{ $article->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-md-12">
                <label class="form-label">Nom</label><br>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="nom" value="{{$article->nom}}">
                </div>
            </div>
            <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="inputEmail5" cols="30" rows="10">{{$article->description}}</textarea>
            </div>
            <div class="col-md-12">
                <label class="col-sm-5 col-form-label">Image</label><br>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control"><br>
                </div>
            </div>
            <div class="col-md-12">
                <label class="col-sm-12 col-form-label">Type</label>
                <div class="col-sm-12">
                    <select name="type" class="form-select">
                        <option value="terrain" {{$article->type == 'terrain' ? 'selected' : ''}}>Terrain</option>
                        <option value="maison" {{$article->type == 'maison' ? 'selected' : ''}}>Maison</option>
                        <option value="studio" {{$article->type == 'studio' ? 'selected' : ''}}>Studio</option>
                        <option value="duplex" {{$article->type == 'duplex' ? 'selected' : ''}}>Duplex</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <label class="col-sm-12 col-form-label">Statut</label>
                <div class="col-sm-12">
                    <select name="statut" class="form-select">

                        <option value="occupe" {{$article->statue == 'occupe' ? 'selected' : ''}}>Occupé</option>
                        <option value="libre" {{$article->statue == 'libre' ? 'selected' : ''}}>Libre</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <input type="submit" class="btn btn-secondary" value="Mettre à jour">
        </form>
    </div>
</div>
@endsection