@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col gap-6 p-6">
    <!-- Título -->
    <div class="flex items-center justify-between">
        <h1 class="h1">
            <i class="fa fa-chart-line"></i> Dashboard
        </h1>
    </div>

    <!-- Cards -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Pendentes -->
        <article class="shadow-lg rounded-2xl p-6 bordered hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Baixa</span>
                <i class="fa fa-refresh text-blue-500 text-2xl"></i>
            </div>
            <p class="text-5xl font-bold my-6 text-center">{{ $priority['baixa'] }}</p>
            <div class="h-2 w-full bg-blue-100 rounded-full overflow-hidden">
                <div class="bg-blue-500 h-2 w-3/10"></div>
            </div>
        </article>

        <!-- Feitas -->
        <article class="shadow-lg rounded-2xl p-6 bordered hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">Média</span>
                <i class="fa fa-check text-yellow-600 text-2xl"></i>
            </div>
            <p class="text-5xl font-bold my-6 text-center">{{  $priority['media'] }}</p>
            <div class="h-2 w-full bg-yellow-100 rounded-full overflow-hidden">
                <div class="bg-yellow-500 h-2 w-3/6"></div>
            </div>
        </article>

        <!-- Atrasadas -->
        <article class="shadow-lg rounded-2xl p-6 bordered hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-red-600 bg-red-100 px-2 py-1 rounded-full">Alta</span>
                <i class="fa fa-bell text-red-600 text-2xl"></i>
            </div>
            <p class="text-5xl font-bold my-6 text-center">{{ $priority['alta'] }}</p>
            <div class="h-2 w-full bg-red-100 rounded-full overflow-hidden">
                <div class="bg-red-600 h-2 w-4/5"></div>
            </div>
        </article>
    </section>
</div>
@endsection