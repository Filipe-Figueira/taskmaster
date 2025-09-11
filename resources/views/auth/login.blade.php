@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <form action="{{ route('authenticate') }}" method="POST" class="form">
        <h1 class="h1 text-center">Login</h1>
        @csrf
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" placeholder="email@exemplo.com" class="form-input"
                value="{{ old('email') }}">
        </div>
        <div>
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" placeholder="Senha" class="form-input" value="">
        </div>
        <div class="form-checkbox">
            <label for="remember">Lembre-me</label>
            <input type="checkbox" id="remember" name="remember">
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>

        <div class="alternative-auth">
            <hr>
            <a href="{{ route('register') }}">Não tenho uma conta</a>
        </div>
    </form>
@endsection
