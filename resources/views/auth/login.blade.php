@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-4">
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf

                <img class="mb-4" src="https://i.imgur.com/Wr5c1Lj.png" alt="AppMax">
                <h1 class="h3 mb-3 font-weight-normal">Por favor, faça login</h1>
                
                <label for="inputEmail" class="sr-only">Endereço de e-mail</label>
                <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Endereço de e-mail" required="" autofocus="">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control mt-2 @error('password') is-invalid @enderror" placeholder="Senha" required="">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button class="btn btn-lg btn-dark btn-block mt-3" type="submit">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection

