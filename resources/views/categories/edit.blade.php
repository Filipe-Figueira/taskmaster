@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <h1 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">Crie uma nova Categoria</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $category->user_id }}">

        <div>
            <label for="name" class="block text-sm font-medium text-gray-600">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome da categoria" value="{{ old('name') ?? $category->name}}"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-400 focus:outline-none">
        </div>

        <button type="submit"
            class="bg-violet-600 text-white px-5 py-2 rounded-lg hover:bg-violet-700 transition flex items-center gap-2">Salvar</button>
    </form>
@endsection
