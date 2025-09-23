@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <h1 class="h1">Edite a Categoria {{ $category->name }}</h1>

@include('partials.error-message')

    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" class="form">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $category->user_id }}">

        <div>
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome da categoria" value="{{ old('name') ?? $category->name}}" class="form-input">
        </div>

        <button type="submit"
            class="btn btn-primary">Salvar</button>
    </form>
@endsection
