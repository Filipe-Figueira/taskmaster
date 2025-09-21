@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    <h1 class="h1">Perfil</h1>
    <section class="flex flex-wrap gap-6 items-center justify-center">
        
        @include('partials.error-message')

        <form action="{{ route('password.update') }}" method="POST" class="form" autocomplete="off">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-bold">Atualizar a senha</h2>
            <p class="max-w-100 text-sm font-light text-left">Use sempre uma senha longa e combinada de caracteres especiais
                e números.</p>
            <div>
                <label for="current_password" class="form-label">Senha actual</label>
                <input type="password" name="current_password" id="current_password" class="form-input">
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

        <form action="{{ route('users.add-avatar') }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-bold">Adicione uma foto.</h2>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-800 border-gray-600 hover:border-gray-500">
                    <div class="flex flex-col items-center justify-center p-6">
                        <svg class="w-8 h-8 mb-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-400"><span class="font-semibold">Clique aqui p/ carregar</span> ou arraste o ficheiro</p>
                        <p class="text-xs text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="avatar" accept="image/*" />
                </label>
            </div>
            <button class="btn btn-info">Adicionar foto</button>
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
    </section>
@endsection
