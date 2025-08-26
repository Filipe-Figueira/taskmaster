@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <h1 class="h1">Crie uma nova Categoria</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" class="form w-80">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $category->user_id }}">

        <div>
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome da categoria" value="{{ old('name') ?? $category->name}}"
                class="form-input"
        </div>

        <button type="submit"
            class="btn btn-primary">Salvar</button>
    </form>
@endsection
