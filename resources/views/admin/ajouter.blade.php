@extends('layout.adminLayout')
@section('contenueAdmin')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ajouter Articles</h5>
        <form class="row g-3" action="{{'/admin/article/AjouterArticle'}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label class="form-label">Nom</label><br>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="nom">
                </div>
            </div>
            <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="inputEmail5" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-12">
                <label class="col-sm-5 col-form-label">Image</label><br>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control"><br>
                </div>
            </div>

            <div class="col-md-12">
                <label class="col-sm-5 col-form-label">Type</label>
                <div class="col-md-12">
                    <select name="type" class="form-select">
                        <option value="terrain">Terrain</option>
                        <option value="maison">Maison</option>
                        <option value="studio">Studio</option>
                        <option value="duplex">Duplex</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <label class="col-sm-2 col-form-label">Select</label>
                <div class="col-sm-12">
                    <select name="statut" class="form-select">
                        <option value="occupe">Occupé</option>
                        <option value="libre">Libre</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </div>
    </form>
</div>
</div>

@endsection