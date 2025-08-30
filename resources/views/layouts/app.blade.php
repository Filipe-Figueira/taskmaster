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

    <!-- Botão para abrir sidebar no mobile -->
    <section class="bordered w-full h-full bg-gray-950/20 flex backdrop-blur-md shadow-lg shadow-black/25">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div>
                <div class="logo-container">
                    <img src="{{ asset('images/taskmaster-logo.jpg')}}" alt="tasmaster-logo">

                    <button id="btnMenu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="#">
                            <i class="fa fa-chart-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}">
                            <i class="fa fa-layer-group"></i>
                            <span>Categorias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tasks.index') }}">
                            <i class="fa fa-tasks"></i>
                            <span>Tarefas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-bell"></i>
                            <span>Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                            <span>Email</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class=" flex flex-col items-center justify-center gap-3">
                <div class="flex flex-col justify-center items-center gap-3 mb-4 text-center">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="avatar"
                        class="w-10 h-10 rounded-full object-cover">
                    <p class="text-sm"><span class="font-medium">{{ auth()->user()->name }}</span></p>
                </div>
                <form action="{{ route('auth.logout') }}" method="POST" class="flex items-center justify-center gap-2">
                    @csrf
                    <button class="btn btn-danger btn-icon"><i class="fa fa-sign-out-alt"></i>Sair</button>
                </form>
            </div>
            </div>
        </nav>
        <!-- Main content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </section>

    <script>
        const btnMenu = document.getElementById('btnMenu');
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
