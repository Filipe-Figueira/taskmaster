@extends('layouts.app')
@section('title', 'Tasks')
@section('content')
    <h1>Suas Tasks</h1>
    <ul>
        @foreach ($tasks as $task)
            <li class="text-white">{{ $task->title }}</li>
        @endforeach
    </ul>
@endsection
