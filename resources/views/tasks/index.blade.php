@extends('layouts.app')
@section('title', 'tasks')
@section('content')
<div class="flex flex-col gap-4 p-4">
    <h1 class="h1"><i class="fa fa-list"></i> Tasks</h1>
   <a href="{{ route('tasks.create') }}" class="w-33 btn btn-primary btn-rounded"><i class="fa fa-plus font-medium"></i>  Nova Task</a>
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
                    Status
                </th>
                <th scope="col">
                    Prazo
                </th>
                <th scope="col">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col">
                    <span class="sr-only">Edit</span>
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
                    <a href="{{ route('tasks.show', ['task' => $task->id])}}" class="link">{{ $task->title }}</a>
                </td>
                <td>
                    {{ $task->category_id }}
                </td>
                <td>
                    {{ $task->priority }}
                </td>
                <td>
                    {{ $task->status }}
                </td>
                <td>
                    {{ $task->due_date->format('d/m/Y') }}
                </td>
                <td>
                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="link">Edit</a>
                </td>
                <td>
                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="btn btn-inverse-danger">Excluír</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection
