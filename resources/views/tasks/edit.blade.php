@extends('layouts.app')
@section('title', "Tasks")
@section('content')
    <h1 class="h1">
        Edite a sua Task
    </h1>
    @include('partials.error-message')
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post" class="form">
        @method('PUT')
        @include('tasks.partials.task-fields')
        <button type="submit"
            class="btn btn-primary btn-icon"><i class="fa fa-file"></i> Salvar</button>
    </form>
@endsection
