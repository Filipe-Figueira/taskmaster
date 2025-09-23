@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <h1 class="h1 mb-6">Perfil</h1>

    @include('partials.error-message')

    <!-- Tabs -->
    <div class="w-full">
        <!-- Cabeçalho das Abas -->
        <div class="flex border-b border-gray-700 mb-6" id="tabs">
            <button data-tab="senha" class="tab-btn px-4 py-2 text-sm font-medium focus:outline-none text-blue-500">
                Alterar Senha
            </button>
            <button data-tab="perfil" class="tab-btn px-4 py-2 text-sm font-medium focus:outline-none text-gray-400">
                Informações do Perfil
            </button>
            <button data-tab="avatar" class="tab-btn px-4 py-2 text-sm font-medium focus:outline-none text-gray-400">
                Foto de Perfil
            </button>
            <button data-tab="excluir" class="tab-btn px-4 py-2 text-sm font-medium focus:outline-none text-gray-400">
                Excluir Conta
            </button>
        </div>

        <!-- Conteúdo das Abas -->
        <div id="tab-content">
            <!-- Alterar senha -->
            <div id="senha" class="tab-panel">
                <form action="{{ route('password.update') }}" method="POST" class="form">
                    @csrf
                    @method('PUT')
                    <h2 class="text-lg font-bold mb-2">Atualizar a senha</h2>
                    <p class="text-sm font-light mb-4">Use sempre uma senha longa com caracteres especiais e números.</p>

                    <label for="current_password" class="form-label">Senha atual</label>
                    <input type="password" name="current_password" id="current_password" class="form-input" required>

                    <label for="password" class="form-label">Nova Senha</label>
                    <input type="password" name="password" id="password" class="form-input" required>

                    <label for="password_confirmation" class="form-label">Confirmação de senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>

                    <button class="btn btn-info mt-4">Alterar senha</button>
                </form>
            </div>

            <!-- Perfil -->
            <div id="perfil" class="tab-panel hidden">
                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')
                    <h2 class="text-lg font-bold mb-2">Informações do perfil</h2>
                    <p class="text-sm font-light mb-4">Atualize as informações do perfil.</p>

                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $user->name) }}" required>

                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-input" value="{{ old('email', $user->email) }}" required>

                    <button class="btn btn-info mt-4">Salvar</button>
                </form>
            </div>

            <!-- Avatar -->
            <div id="avatar" class="tab-panel hidden">
                <form action="{{ route('users.add-avatar') }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    @method('PUT')
                    <h2 class="text-lg font-bold mb-2">Foto de perfil</h2>
                    <p class="text-sm font-light mb-4">Carregue uma imagem JPG ou PNG (máx. 800x400px).</p>

                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-45 border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-800 border-gray-600 hover:border-gray-500">
                        <div class="flex flex-col items-center justify-center p-6">
                            <svg class="w-8 h-8 mb-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-400"><span class="font-semibold">Clique para carregar</span> ou arraste</p>
                            <p class="text-xs text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" name="avatar" accept="image/*" />
                    </label>

                    <button class="btn btn-info mt-4">Adicionar foto</button>
                </form>
            </div>

            <!-- Excluir conta -->
            <div id="excluir" class="tab-panel hidden">
                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="form" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <h2 class="text-lg font-bold mb-2 text-red-500">Excluir Conta</h2>
                    <p class="text-sm font-light mb-4">Se excluir a sua conta, todas as informações e recursos criados serão permanentemente eliminados.</p>

                    <button class="btn btn-danger">Excluir conta</button>
                </form>
            </div>
        </div>
    </div>
    <x-modal-dialog message="Tem certeza que deseja excluir a sua conta?"/>
    @push('ajax-requests')
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/ajax-requests.js') }}"></script>
    @endpush
    <script src="{{ asset('js/tabs.js') }}"></script>
@endsection