@extends('layouts.app')
@section('title', "Tasks")
@section('content')
    <h1 class="h1">
        Crie uma nova Task
    </h1>
    @include('partials.error-message')
    <form action="{{ route('tasks.store') }}" method="post" class="form">
        @csrf
        <label for="category" class="form-label">Categoria</label>
        <select name="category_id" id="category" class="form-select">
            <option value="">Selecione...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>

        <div>
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title"
                class="form-input" value="{{ old('title') }}">
        </div>

        <div>
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" rows="4" placeholder="Descreva sua task..."
                class="form-textarea" value="{{ old('description') }}">{{ old('description') }}</textarea>
        </div>

            <div>
                <label for="priority" class="form-label">Prioridade</label>
                <select name="priority" id="priority"
                    class="form-select">
                    <option value="">Selecione...</option>
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
        <div>
            <label for="due_date" class="form-label">Prazo para finalizar</label>
            <input type="date" name="due_date" id="due_date"
                class="form-date" value="{{ old('due_date')}}">
        </div>
        <button type="submit"
            class="btn btn-primary btn-icon">Salvar</button>
    </form>
@endsection
