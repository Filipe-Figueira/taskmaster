{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Organize suas tarefas</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <section class="bordered">
        <!-- Hero -->
        <section class=" text-white py-20 rounded-t-2xl border-b-2 border-b-gray-800">
            <div class="max-w-5xl mx-auto text-center px-6">
                <a href="{{ route('home') }}" class="mb-6 flex items-center justify-center">
                    <img src="{{ asset('images/taskmaster-logo.jpeg') }}" alt="taskmaster-logo" class="object-cover w-60 rounded-full">
                </a>
                <p class="text-xl mb-8 text-gray-200">
                    Organize suas tarefas e aumente sua produtividade com simplicidade e eficiência.
                </p>
                @guest
                <div class="flex justify-center gap-4">
                    <a href="{{ route('register') }}" class="btn btn-rounded btn-primary px-6 py-3 shadow-lg">
                        Criar Conta
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-rounded px-6 py-3 ring-2 ring-indigo-700 hover:bg-indigo-700 shadow-lg">
                        Entrar
                    </a>
                </div>
            @else
                <a href="{{ route('tasks.index') }}"
                    class="btn-rounded btn-primary px-8 py-4 font-semibold shadow-lg transition">
                    Minhas Tarefas
                </a>
            @endguest

            </div>
        </section>

        <main class="max-w-6xl mx-auto p-8">

            <!-- Features -->
            <section class="my-16">
                <h2 class="text-3xl font-bold text-center mb-12">Funcionalidades</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="p-6 bg-gray-900 rounded-2xl shadow-lg text-center hover:shadow-xl transition">
                        <i class="fa fa-user-lock text-5xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Autenticação</h3>
                        <p class="text-gray-400">Cadastro e login de usuários com proteção integrada.</p>
                    </div>
                    <div class="p-6 bg-gray-900 rounded-2xl shadow-lg text-center hover:shadow-xl transition">
                        <i class="fa fa-tasks text-5xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Gerencie Tarefas</h3>
                        <p class="text-gray-400">Crie, edite, conclua e exclua tarefas facilmente.</p>
                    </div>
                    <div class="p-6 bg-gray-900 rounded-2xl shadow-lg text-center hover:shadow-xl transition">
                        <i class="fa fa-layer-group text-5xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Categorias</h3>
                        <p class="text-gray-400">Organize suas tarefas por categorias personalizadas.</p>
                    </div>
                </div>
            </section>

            <!-- Technologies -->
            <section class="my-16">
                <h2 class="text-3xl font-bold text-center mb-12">Tecnologias Utilizadas</h2>
                <ul class="flex flex-wrap items-center justify-center gap-8 text-center">
                    <li><i class="fab fa-php text-6xl text-violet-500"></i></li>
                    <li><i class="fab fa-laravel text-6xl text-red-500"></i></li>
                    <li><i class="fab fa-js text-6xl text-yellow-400"></i></li>
                    <li>
                        <svg class="w-20 h-auto text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.782 5.72a4.773 4.773 0 0 0-4.8 4.173 3.43 3.43 0 0 1 2.741-1.687c1.689 0 2.974 1.972 3.758 2.587a5.733 5.733 0 0 0 5.382.935c2-.638 2.934-2.865 3.137-3.921-.969 1.379-2.44 2.207-4.259 1.231-1.253-.673-2.19-3.438-5.959-3.318ZM6.8 11.979A4.772 4.772 0 0 0 2 16.151a3.431 3.431 0 0 1 2.745-1.687c1.689 0 2.974 1.972 3.758 2.587a5.733 5.733 0 0 0 5.382.935c2-.638 2.933-2.865 3.137-3.921-.97 1.379-2.44 2.208-4.259 1.231-1.253-.673-2.19-3.443-5.963-3.317Z" />
                        </svg>
                    </li>
                </ul>
            </section>

            <!-- Call to Action -->
            <section class="text-center my-20">
                <h2 class="text-2xl font-bold mb-8">Pronto para começar?</h2>
                <a href="{{ route('tasks.index') }}"
                    class="btn-primary btn-rounded px-8 py-4 font-semibold shadow-lg">
                    Comece a usar
                </a>
            </section>
        </main>

        <footer class="bg-gray-900 rounded-b-2xl py-6 text-center">
            <p>&copy; {{ date('Y') }} Desenvolvido por <a href="http://github.com/Filipe-Figueira" target="_blank" class="link">Filipe Figueira</a></p>
        </footer>
    </section>

</body>

</html>
