@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="flex flex-col ">
        <h1 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">Categorias</h1>

        <ul>
            @foreach ($categories as $category)
            <li class="text-white grid grid-cols-3">
                <a href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a>
                <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="w-20 text-white bg-indigo-500 py-2 text-center rounded-full mb-3">Editar</a>
                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                      <button type="submit" class="w-20 text-white bg-red-500 py-2 text-center rounded-full mb-3">Excluír</button>
                </form>

            </li>

            @endforeach
        </ul>
        <a href="{{ route('categories.create') }}" class="text-white bg-indigo-700 py-2 text-center rounded-full">Nova Categoria</a>
    </div>
@endsection
