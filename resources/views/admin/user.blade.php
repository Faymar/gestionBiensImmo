@extends('layout.adminLayout')
@section('contenueAdmin')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des Utilisateurs</h5>

                    <!-- Table with stripped rows -->
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" name="" value="{{$i=1}}">
                            @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->email}}</td>
                                @if ($user->role == 1)
                                <td>Admin</td>
                                @else
                                <td>Visiteur</td>
                                @endif
                                <td>
                                    <form action="{{'/admin/deleteUser/'. $user->id}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger rounded-pill">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <input type="hidden" name="" value="{{$i++}}">
                            @empty
                            <p>pas de utilisateur inscrit</p>
                            @endforelse

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