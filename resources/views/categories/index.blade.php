@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="">
    <h1 class="h1">Categorias</h1>
    <div class="block mb-6"><a href="{{ route('categories.create') }}" class="btn btn-primary">Nova Categoria</a></div>
    <table class="table-auto rounded-2xl ring ring-white/15">
        <thead>
            <tr>
                <th>Nome</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="p-2">
                        <a href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a>
                    </td>

                    <td>
                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                            class="btn btn-inverse-danger btn-icon btn-sm">Editar<i class="fa fa-pencil"></i></a>
                    </td>

                    <td>
                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="btn btn-danger">Excluír</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
