@extends('layout.userLayout')
@section('contenueUser')
    <div style="display: flex; align-items: center;">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        

        <form action="/article/articles" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nom</label><br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom">
                </div>
            </div>
            <div class="input-group">
                <label class="col-sm-5 col-form-label">Description</label>
                <br>
                <textarea name="description" class="form-control" aria-label="With textarea"></textarea>

            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Image</label><br>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control"><br>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Type</label>
                <div class="col-sm-10">
                    <select name="type" class="form-select">
                        <option value="terrain">Terrain</option>
                        <option value="maison">Maison</option>
                        <option value="studio">Studio</option>
                        <option value="duplex">Duplex</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Statut</label>
                <div class="col-sm-10">
                    <select name="statut" class="form-select">

                        <option value="occupe">Occupé</option>
                        <option value="libre">Libre</option>     
                    </select>
                </div>
            </div>
            <div class="input-group">
                <button type="submit" class="btn btn-success">Ajouter Article</button>
                

            </div>

            </div>
        </form>
@endsection
