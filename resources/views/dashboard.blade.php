@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="flex flex-col gap-4 p-4 pb-0">
    <h1 class="h1"><i class="fa fa-chart-line"></i> Dashboard</h1>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque libero, sequi deserunt repudiandae laboriosam est ea eaque consectetur facilis velit adipisci voluptate atque, animi ullam ipsam ex quos ducimus! Accusamus?</p>
    <section class="cards grid grid-cols-3 gap-4">
        <aside class="bordered">
            <h2 class="h2">Pendentes <i class="fa fa-refresh"></i></h2>
            <span class="value text-6xl block text-center mb-4">4</span>
            <div class="bg-yellow-500 w-full h-6 rounded-b-[inherit]"></div>
        </aside>
        <aside class="bordered">
            <h2 class="h2">Feitas <i class="fa fa-check"></i></h2>
            <span class="value text-6xl block text-center mb-4">4</span>
            <div class="bg-green-500 w-full h-6 rounded-b-[inherit]"></div>
        </aside>
        <aside class="bordered">
            <div class=" px-10">
                <h2 class="h2">Atrasadas <i class="fa fa-bell"></i></h2>
                <span class="value text-6xl block text-center mb-4">4</span>
            </div>
            <div class="bg-red-600 w-full h-6 rounded-b-[inherit]"></div>
        </aside>
    </section>

</div>
@endsection
