@extends('layouts.app')
@section('title', 'Task Details')
@section('content')
    <div class="max-w-4xl p-6">
        <h1 class="h1">
            <i class="fas fa-list"></i>
            Detalhes da Tarefa
        </h1>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="flex items-center gap-3 bg-gray-800 rounded-xl p-5 shadow">
                <i class="fas fa-folder text-2xl text-yellow-500"></i>
                <div>
                    <span class="block text-sm text-gray-400">Categoria</span>
                    <span class="text-lg font-semibold text-gray-100">
                        {{ $task->category->name }}
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-3 bg-gray-800 rounded-xl p-5 shadow">
                <i class="fas fa-heading text-2xl text-indigo-500"></i>
                <div>
                    <span class="block text-sm text-gray-400">Título</span>
                    <span class="text-lg font-semibold text-gray-100">
                        {{ $task->title }}
                    </span>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-gray-800 rounded-xl p-5 shadow md:col-span-2">
                <i class="fas fa-align-left text-2xl text-gray-500 mt-1"></i>
                <div>
                    <span class="block text-sm text-gray-400">Descrição</span>
                    <p class="text-base text-gray-300 leading-relaxed">
                        {{ $task->description }}
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-3 bg-gray-800 rounded-xl p-5 shadow">
                <i class="fas fa-flag text-2xl text-red-500"></i>
                <div>
                    <span class="block text-sm text-gray-400">Prioridade</span>
                    @include('tasks.partials.priority')
                </div>
            </div>

            <div class="flex items-center gap-3 bg-gray-800 rounded-xl p-5 shadow">
                <i class="fas fa-calendar-alt text-2xl text-green-500"></i>
                <div>
                    <span class="block text-sm text-gray-400">O prazo termina em:</span>
                    <span class="text-lg font-medium text-gray-100">
                        {{ $task->due_date->diffForHumans() }}
                    </span>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-8 gap-4">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-icon btn-info">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-icon btn-danger">
                    <i class="fas fa-trash"></i> Excluir
                </button>
            </form>
        </div>
    </div>
    <x-modal-dialog message="Tem certeza que deseja excluír esta tarefa?" />
    @push('ajax-requests')
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/ajax-requests.js') }}"></script>
    @endpush
@endsection
