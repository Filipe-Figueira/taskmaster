<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - @yield('title')</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <section class="bordered w-full h-full bg-gray-950/20 flex backdrop-blur-md shadow-lg shadow-black/25">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div>
                <div class="logo-container">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/taskmaster-logo.jpeg') }}" alt="taskmaster-logo"></a>

                    <button id="btn-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <ul class="space-y-2">
                    <li title="Dashboard">
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-chart-line"></i>
                            <span class="item-description">Dashboard</span>
                        </a>
                    </li>
                    <li title="Categorias">
                        <a href="{{ route('categories.index') }}">
                            <i class="fa fa-layer-group"></i>
                            <span class="item-description">Categorias</span>
                        </a>
                    </li>
                    <li title="Tarefas">
                        <a href="{{ route('tasks.index') }}">
                            <i class="fa fa-tasks"></i>
                            <span class="item-description">Tarefas</span>
                        </a>
                    </li>
                    <li title="Profile">
                        <a href="{{ route('users.edit', ['user' => auth()->user()->id]) }}">
                            <i class="fa fa-user"></i>
                            <span class="item-description">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>

            <aside id="account">
                <a href="{{ route('users.edit', ['user' => auth()->user()->id]) }}" id="avatar-container">
                    <img src="{{ asset('storage/'.auth()->user()->avatar ) }}" alt="avatar" title="{{ auth()->user()->name }}">
                    <span class="item-description">{{ auth()->user()->name }}</span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button title="Logout" class="btn btn-danger btn-icon">
                        <i class="fa fa-sign-out-alt"></i>
                        <span class="item-description">Sair</span>
                    </button>
                </form>
            </aside>
            </div>
        </nav>
        <!-- Main content -->
        <section class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </section>
    </section>
    </main>
    @stack('ajax-requests')

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
</body>
</html>
