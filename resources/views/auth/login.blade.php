@extends('layout.auth')
@section('formulaire')
<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Se Connecter</h5>
    <p class="text-center small">Entrez Votre Addresse Email et Votre Mot de Passe</p>
</div>
<form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
    @csrf
    <div class="col-12">
        <label for="yourUsername" class="form-label">Votre Mail</label>
        <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <label for="yourPassword" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Se connecter</button>
    </div>
    <div class="col-12">
        <p class="small mb-0">Vous n'avez pas de compte ? <a href="{{ route('register') }}">Creez</a></p>
    </div>
</form>
@endsection