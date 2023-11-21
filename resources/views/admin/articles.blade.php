@extends('layout.adminLayout')
@section('contenueAdmin')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>

                    <!-- Table with stripped rows -->
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nom</th>
                                <th scope="col">description</th>
                                <th scope="col">image</th>
                                <th scope="col">type</th>
                                <th scope="col">statue</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($article as $article)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{asset('storage/'. $article->image) }}" alt="" class="rounded-circle" width="40" height="40">
                                </td>
                                <td>{{ $article->nom }} </td>
                                <td>{{ $article->description }}</td>
                                <td>{{ $article->type }}</td>
                                <td>{{ $article->statue }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="/modifier/{{$article->id}}" class="btn btn-warning m-1">Modifier</a>
                                    <form method="POST" action="/articleSupprimer/{{ $article->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger m-1">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav><!-- End Right/End Aligned Pagination -->
                </div>
            </div>

        </div>
    </div>
</section>
@endsection