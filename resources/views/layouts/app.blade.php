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
                    <a href=""><img src="{{ asset('images/taskmaster-logo.jpg') }}" alt="tasmaster-logo"></a>

                    <button id="btn-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <ul class="space-y-2">
                    <li title="Dashboard">
                        <a href="#">
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
                    <li title="Notifications">
                        <a href="#">
                            <i class="fa fa-bell"></i>
                            <span class="item-description">Notifications</span>
                        </a>
                    </li>
                    <li title="Profile">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="item-description">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>

            <aside id="account">
                <a href="#" id="avatar-container">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" title="{{ auth()->user()->name }}">
                    <span class="item-description">{{ auth()->user()->name }}</span>
                </a>
                <form action="{{ route('auth.logout') }}" method="POST">
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
    </main>
    @stack('ajax-requests')

    <script>
        const btnMenu = document.getElementById('btn-menu');
        const sidebar = document.getElementById('sidebar');
        const menu = document.querySelectorAll("#sidebar ul li a");

        btnMenu.addEventListener('click', () => {
            // sidebar.classList.toggle('-translate-x-full')
            menu.forEach(i => {

                i.classList.toggle('menu-mobile');
            });
            sidebar.classList.toggle('sidebar-mobile')
        });
    </script>
</body>
</html>
