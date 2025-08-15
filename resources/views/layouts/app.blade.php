<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/bootstrap-icons/font/bootstrap-icons.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black/80 min-h-screen flex">

    <!-- Sidebar -->
    <nav class="bg-black/60 backdrop-blur-md shadow-xl rounded-r-3xl w-64 flex flex-col justify-between p-5">
        <div>
            <div class="flex items-center gap-3 mb-10">
                <svg width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                <h1 class="text-lg font-bold text-gray-700">TaskMaster</h1>

            </div>

            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-600 transition">
                        <i class="fa fa-chart-line text-violet-600 text-lg"></i>
                        <span class="text-gray-700 font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{  route('categories.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-600 transition">
                        <i class="fa fa-layer-group text-violet-600 text-lg"></i>
                        <span class="text-gray-700 font-medium">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-600 transition">
                        <i class="fa fa-tasks text-violet-600 text-lg"></i>
                        <span class="text-gray-700 font-medium">Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-600 transition">
                        <i class="fa fa-bell text-violet-600 text-lg"></i>
                        <span class="text-gray-700 font-medium">Notifications</span>

                    </a>
                </li>
                <li>

                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-600 transition">
                        <span class="text-gray-700 font-medium">Email</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="w-10 h-10 rounded-full object-cover">
                <span class="font-medium text-gray-700">John Doe</span>
            </div>
            <a href="#" class="flex items-center gap-2 text-red-500 hover:text-red-600">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-1 p-6">
        <section class="bg-black/20 backdrop-blur-md rounded-3xl p-6 shadow-xl">
            @yield('content')
        </section>
    </main>

</body>
</html>
