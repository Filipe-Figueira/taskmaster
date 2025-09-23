@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <h1 class="h1">Crie uma nova Categoria</h1>

    @include('partials.error-message')

    <form action="{{ route('categories.store') }}" method="post" class="form">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div>
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome da categoria"
                class="form-input">
        </div>

        <button type="submit"
            class="btn btn-primary">Salvar</button>
    </form>
@endsection
