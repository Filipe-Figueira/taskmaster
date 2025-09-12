@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    <h1 class="h1">Perfil</h1>
    <section class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-bold">Informações do perfil</h2>
            <p class="max-w-100 text-sm font-light text-left">Atualize as informações do perfil.</p>
            <div>
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-input"
                    value="{{ old('name', $user->name) }}">
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-input"
                    value="{{ old('email', $user->email) }}">
            </div>
            <button class="btn btn-info">Salvar</button>
        </form>


        <form action="{{ route('password.update') }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-bold">Atualizar a senha</h2>
            <p class="max-w-100 text-sm font-light text-left">Use sempre uma senha longa e combinada de caracteres especiais
                e números.</p>
            <div>
                <label for="current_password" class="form-label">Senha actual</label>
                <input type="current_password" name="current_password" id="current_password" class="form-input">
            </div>
            <div>
                <label for="password" class="form-label">Nova Senha</label>
                <input type="password" name="password" id="password" class="form-input">
            </div>
            <div>
                <label for="password_confirmation" class="form-label">Confirmação de senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
            </div>
            <button class="btn btn-info">Alterar senha</button>
        </form>

        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="form">
            @csrf
            @method('DELETE')
            <h2 class="text-lg font-bold">Excluir Conta</h2>
            <p class="max-w-100 text-sm font-light text-left">Se excluir a sua conta. Todas as suas informações e recursos
                criados (tarefas, categorias), serão permanentemente eliminados.</p>
            <div>
                <button class="btn btn-danger">Excluir conta</button>
            </div>
        </form>
    </section>
@endsection
