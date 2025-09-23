@extends('layouts.app')
@section('title', 'tasks')
@section('content')
    <div class="flex flex-col gap-4 p-4">
        <h1 class="h1"><i class="fa fa-list"></i> Tasks</h1>
        <div class="block mb-4">
            <a href="{{ route('tasks.create') }}" class="btn btn-rounded btn-primary">
                <i class="fa fa-plus font-medium"></i>
                Nova Task</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Título
                        </th>
                        <th scope="col">
                            Categoria
                        </th>
                        <th scope="col">
                            Prioridade
                        </th>
                        <th scope="col">
                            Prazo
                        </th>
                        <th scope="col">
                            <span class="sr-only">Actions</span>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->id }}
                            </td>
                            <td>
                                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                                    class="link">{{ $task->title }}</a>
                            </td>
                            <td>
                                <a href="{{ route('categories.show', ['category' => $task->category_id]) }}" class="link">
                                    {{ $task->category->name }}
                                </a>
                            </td>
                            <td>
                                @include('tasks.partials.priority')
                            </td>
                            <td>
                                <span class="badge">
                                    <i class="fa fa-clock"></i>
                                    {{ $task->due_date->diffForHumans() }}
                                </span>
                            </td>
                            <td class="flex gap-2">
                                <a title="Editar" href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                                    class="btn btn-icon btn-info">
                                    <fa class="fa fa-edit"></fa>
                                </a>
                                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
                                    class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button title="Excluir" type="submit" class="btn btn-danger"><i
                                            class="fa fa-close"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <x-modal-dialog message="Tem certeza que deseja excluir esta tarefa?" />
    </div>
    @push('ajax-requests')
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/ajax-requests.js') }}"></script>
    @endpush
@endsection
