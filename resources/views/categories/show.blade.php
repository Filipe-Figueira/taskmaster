@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<div class="p-6">
    <h1 class="h1">
        <i class="fa fa-folder-open text-yellow-500"></i>
        {{ $category->name }}
    </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tasks as $task)
                <div class="flex flex-col gap-3 bg-gray-800 p-5 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fa fa-tasks text-lg"></i>
                        <h2 class="font-semibold text-lg">
                            {{ $task->title }}
                        </h2>
                    </div>
                    <p>
                        {{ Str::limit($task->description, 30, '...') }}
                    </p>

                    <a href="{{ route('tasks.show', $task->id) }}" 
                       class="btn btn-icon btn-info">
                        <i class="fa fa-eye"></i> Ver Detalhes
                    </a>
                </div>
            @endforeach
        </div>
</div>
@endsection
