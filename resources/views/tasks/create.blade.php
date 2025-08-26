@extends('layouts.app')
@section('title', "Tasks")
@section('content')
    <h1 class="h1">
        Crie uma nova Task
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="post" class="form">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <label for="category" class="form-label">Categoria</label>
        <select name="category_id" id="category" class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->id }}</option>
            @endforeach

        </select>

        <div>
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title"
                class="form-input">
        </div>

        <div>
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" rows="4" placeholder="Descreva sua task..."
                class="form-textarea">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="priority" class="form-label">Prioridade</label>
                <select name="priority" id="priority"
                    class="form-select">
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status"
                    class="form-select">
                    <div>
                        <option value="Pendente">Pendente</option>
                        <option value="Concluída">Concluída</option>
                        <option value="Atrasada">Atrasada</option>
                        <option value="Cancelada">Cancelada</option>
                    </div>
                </select>
            </div>
        </div>

        <div>
            <label for="due_date" class="form-label">Prazo para finalizar</label>
            <input type="date" name="due_date" id="due_date"
                class="form-date">
        </div>

        <button type="submit"
            class="btn btn-primary btn-icon"><i class="fa fa-file"></i> Salvar</button>
    </form>
@endsection
