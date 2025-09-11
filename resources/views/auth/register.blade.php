@extends('layouts.auth')
@section('title', 'Register')
@section('content')

    <form action="{{ route('storeUser') }}" method="post" class="form">
        <h1 class="h1 text-center">Crie uma conta</h1>
        @csrf
        <div>
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" placeholder="Seu nome" class="form-input"
                value="{{ old('name') }}">
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" placeholder="email@exemplo.com" class="form-input"
                value="{{ old('email') }}">
        </div>
        <div>
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" placeholder="Senha" class="form-input">
        </div>
        <div>
            <label for="password_confirmation" class="form-label">Confirmação de senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme a senha"
                class="form-input">
        </div>
        <button type="submit" class="btn btn-primary">Criar conta</button>
        <div class="alternative-auth">
            <hr>
            <a href="{{ route('login') }}">Já tenho uma conta</a>
        </div>
    </form>
@endsection
