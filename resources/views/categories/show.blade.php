@extends('layouts.app')
@section('title', 'Tasks')
@section('content')
    <h1 class="h1">{{ $category->name }}</h1>
    @foreach ($tasks as $task)
        <ul>
            <li>Título: <a href="{{ route('tasks.show', $task->id) }}" class="link">{{ $task->title }}</a></li>
        </ul>
    @endforeach
@endsection
