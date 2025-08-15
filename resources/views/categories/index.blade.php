@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <h1>Categorias</h1>
    <ul>
        @foreach ($categories as $category)
            <li class="text-white">{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
