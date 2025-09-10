@extends('layouts.auth')
@section('title', 'Register')
@section('content')

<form action="{{ route('auth.register') }}" method="post" class="form">
    <h1 class="h1 text-center">Crie uma conta</h1>
    @csrf
    <div>
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" placeholder="Seu nome" class="form-input"
            value="{{ old('name') }}"">
    </div>
    <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" placeholder="email@exemplo.com" class="form-input"
            value="{{ old('email') }}">
    </div>
    <div>
        <label for="password" class="form-label">Senha</label>
        <input type="password" name="password" id="password" placeholder="Senha" class="form-input"
            value="{{ old('password') }}"">
    </div>
    <div>
        <label for="password_confirm" class="form-label">Confirmação de senha</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Confirme a senha"
            class="form-input" value="{{ old('password_confirm') }}"">
    </div>
    <button type="submit" class="btn btn-primary">Criar conta</button>
    <div class="alternative-auth">
        <hr>
        <a href="">Já tenho uma conta</a>
    </div>
</form>
@endsection
