@extends('layouts.app')
@section('title', 'tasks')
@section('content')
<div class="flex flex-col gap-4 p-4">
    <h1 class="text-2xl font-bold mb-6 flex items-center gap-2 uppercase"><i class="fa fa-list"></i> Tasks</h1>
   <a href="{{ route('tasks.create') }}" class="w-30 bg-indigo-700 py-2 text-center rounded-full"><i class="fa fa-plus font-medium"></i>  Nova Task</a>
    <table class="w-full table-auto border-collapse text-sm rounded-2xl ring ring-white/15">
        <thead>
            <tr class="uppercase">
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600">#</th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600 dark:text-gray-200">Título</th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600">Categoria</th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600">Status</th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600">Prioridade</th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600">Prazo</th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600"></th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600"></th>
                <th class="border-b py-3 px-3 text-center font-medium text-gray-4 border-gray-600"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr class="text-center ">
                    <td>{{ $task->id }}</td>
                    <td class="p-2">
                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="hover:text-indigo-400 hover:underline transition-all duration-300 ease-in-out">{{ $task->title }}</a>
                    </td>

                    <td>
                        {{ $task->category_id }}
                    </td>
                    <td>
                        {{ $task->status }}
                    </td>
                    <td>
                        {{ $task->priority }}
                    </td>
                    <td>
                        {{ $task->due_date->format('d-m-Y') }}
                    </td>

                    <td class="pt-2">
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                            class="inline-block w-20 text-white bg-indigo-500 py-2 text-center rounded-full mb-3">Editar</a>
                    </td>

                    <td class="pt-2">
                        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="w-20 text-white bg-red-500 py-2 text-center rounded-full mb-3">Excluír</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
