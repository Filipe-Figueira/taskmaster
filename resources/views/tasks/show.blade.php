@extends('layouts.app')
@section('title', "Tasks")
@section('content')
    <h1 class="h1">
        Task
    </h1>
    <ul>
        <li>Categoria: {{ $task->category->name }}</li>
        <li>Título: {{ $task->title }}</li>
        <li>Descrição: {{ $task->description }}</li>
        <li>Prioridade: {{ $task->priority }}</li>
        <li>Prazo p/ finalizar: {{ $task->due_date->format('d-m-Y') }}</li>
    </ul>
@endsection
