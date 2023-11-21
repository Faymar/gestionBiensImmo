@extends('layout.auth')
@section('formulaire')
<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Creez Un Compte</h5>
    <p class="text-center small">Entrez Vos Informationns pour creer un compte</p>
</div>
<form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
    @csrf
    <div class="col-12">
        <label for="yourName" class="form-label">Votre Nom</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <label for="yourName" class="form-label">Votre Prenom </label>
        <input id="name" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-12">
        <label for="yourUsername" class="form-label">Username</label>
        <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <label for="yourPassword" class="form-label">Votre Mot De Passe</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-12">
        <label for="yourPassword" class="form-label">Confimer Votre Mot De Passe</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Create Account</button>
    </div>
    <div class="col-12">
        <p class="small mb-0">Avez-vous deja un compte? <a href="{{ route('login') }}">Se connecter</a></p>
    </div>
</form>
@endsection