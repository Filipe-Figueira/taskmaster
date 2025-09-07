@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="flex flex-col gap-4 p-4">
    <h1 class="h1"><i class="fa fa-layer-group"></i> Categorias</h1>

    <a href="{{ route('categories.create') }}" class="w-42 whitespace-nowrap btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Nova Categoria</a>
    <div class="table-container">
        <table>
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
                        <td>
                            <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="link">{{ $category->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                class="btn btn-inverse-info btn-icon btn-sm">Editar<i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon">
                                    <i class="fa fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <dialog id="modal" class="rounded-lg shadow-lg p-6 w-96">
        <h3 class="text-lg font-bold mb-4">Confirmar Exclusão</h3>
        <p class="mb-6 text-gray-600">Tem certeza que deseja excluir esta categoria?</p>
        <div class="flex justify-end gap-2">
            <button id="cancelDelete" type="button"
                class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancelar</button>
            <button id="confirmDelete" type="button"
                class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">
                <i class="fa fa-trash"></i> Excluir
            </button>
        </div>
    </dialog>
</div>
@push('ajax-requests')
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/ajax-requests.js') }}"></script>
    @endpush
@endsection
