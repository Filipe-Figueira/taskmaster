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
                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn btn-danger btn-icon" name="open-modal" id="categoria-{{ $category->id}}"><i class="fa fa-trash"></i> Excluír</button>
                                <dialog>
                                    <div class="flex items-center-justify-center gap-3">
                                        <button type="button" class="btn btn-danger btn-icon"><i class="fa fa-trash"></i> Sim</button>
                                        <button type="button" class="btn btn-danger btn-icon"><i class="fa fa-trash"></i> Não</button>
                                    </div>
                                </dialog>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{asset('js/jquery-3.7.1.min.js')}}">
    </script>
    <script>
        let openModal = $('form').on('click', function (e) {
        console.log(e);
    })
    </script>

</div>
@endsection
