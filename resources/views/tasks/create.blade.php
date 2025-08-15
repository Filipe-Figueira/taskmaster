@extends('layouts.app')
@section('title', "Tasks")
@section('content')
    <h2 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
        Adicionar uma nova Task
    </h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="post" class="space-y-4">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? 1 }}">
        <input type="hidden" name="category_id" value="">

        <div>
            <label for="title" class="block text-sm font-medium text-gray-600">Título</label>
            <input type="text" name="title" id="title"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-400 focus:outline-none">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-600">Descrição</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-400 focus:outline-none resize-none"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="priority" class="block text-sm font-medium text-gray-600">Prioridade</label>
                <select name="priority" id="priority"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-400 focus:outline-none">
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
                <select name="status" id="status"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-400 focus:outline-none">
                    <option value="Pendente">Pendente</option>
                    <option value="Concluída">Concluída</option>
                    <option value="Atrasada">Atrasada</option>
                    <option value="Cancelada">Cancelada</option>
                </select>
            </div>
        </div>

        <div>
            <label for="due_date" class="block text-sm font-medium text-gray-600">Prazo para finalizar</label>
            <input type="date" name="due_date" id="due_date"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-400 focus:outline-none">
        </div>

        <button type="submit"
            class="bg-violet-600 text-white px-5 py-2 rounded-lg hover:bg-violet-700 transition flex items-center gap-2">Salvar</button>
    </form>
@endsection
