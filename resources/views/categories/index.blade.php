@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="flex flex-col gap-4 p-4">
        <h1 class="h1"><i class="fa fa-layer-group"></i> Categorias</h1>
        <div class="block mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Nova
                Categoria</a>
        </div>
        
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
                                <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                                    class="link">{{ $category->name }}</a>
                            </td>
                            <td>
                                <a title="Editar" href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                    class="btn btn-inverse-info btn-icon btn-sm"><i class="fa fa-edit"></i>Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Excluir" type="submit" class="btn btn-danger btn-icon">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <x-modal-dialog message="Tem certeza que deseja excluir esta categoria?"/>
    </div>
    @push('ajax-requests')
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/ajax-requests.js') }}"></script>
    @endpush
@endsection
