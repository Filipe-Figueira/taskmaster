@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <h1 class="text-xl font-semibold text-white/90 mb-6 flex items-center gap-2">Crie uma nova Categoria</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="post" class="form">
        @csrf
        <input type="hidden" name="user_id" value="{{ $userId }}">

        <div>
            <label for="name" class="block text-sm font-medium text-white/90">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome da categoria"
                class="text-white/90 w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-400 focus:outline-none">
        </div>

        <button type="submit"
            class="bg-violet-600 text-white px-5 py-2 rounded-lg hover:bg-violet-700 transition flex items-center gap-2">Salvar</button>
    </form>
@endsection
