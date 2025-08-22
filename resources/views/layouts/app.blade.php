<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome/css/all.min.css') }}">
    <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('icons/bootstrap-icons/font/bootstrap-icons.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main class="bordered w-full h-full bg-gray-950/20 flex backdrop-blur-md shadow-lg shadow-black/25">
        <!-- Sidebar -->
        <nav class="navbar">
            <div>
                <div class="flex items-center gap-3 mb-10">
                    <h1 class="text-lg font-bold ">TaskMaster</h1>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="">
                            <i class="fa fa-chart-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{  route('categories.index') }}">
                            <i class="fa fa-layer-group"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tasks.index') }}">
                            <i class="fa fa-tasks"></i>
                            <span>Tasks</span>
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
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="w-10 h-10 rounded-full object-cover">
                    <span class="font-medium ">John Doe</span>
                </div>
                <div class="w-20">
                    <form action="{{ route('auth.logout') }}" method="POST" class="flex items-center justify-center gap-2">
                    @csrf

                        <button class="btn btn-danger btn-icon"><i class="fa fa-sign-out-alt"></i>Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <main class="w-full p-6">
             @yield('content')
        </main>
    </main>

</body>
</html>
