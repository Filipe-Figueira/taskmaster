<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Home</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <section class="bordered w-full h-full bg-gray-950/20 flex backdrop-blur-md shadow-lg shadow-black/25">
        <section class="flex-1 p-6 overflow-y-auto">
            <h1 class="h1">Welcome to Tasmaster</h1>
            <p class="mb-6 text-lg">
                TaskMaster é uma aplicação de lista de tarefas (to-do list) desenvolvida em Laravel para ajudar no gerenciamento do dia a dia de forma simples, organizada e produtiva. Com autenticação de usuários, gerenciamento de tarefas e categorias, o TaskMaster é ideal para quem busca aumentar sua produtividade.
            </p>

             <!-- Features -->
             <article class="mb-8">
                <h2 class="text-2xl font-bold mb-3">Funcionalidades</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li>🔑 Autenticação de usuários (login, registro)</li>
                    <li>✅ CRUD completo de tarefas
                        <ul class="list-disc list-inside ml-6">
                            <li>Criar novas tarefas</li>
                            <li>Editar tarefas existentes</li>
                            <li>Marcar como concluídas</li>
                            <li>Excluir tarefas</li>
                        </ul>
                    </li>
                    <li>📂 CRUD de categorias
                        <ul class="list-disc list-inside ml-6">
                            <li>Criar categorias para organizar tarefas</li>
                            <li>Editar e excluir categorias</li>
                        </ul>
                    </li>
                    <li>📱 Layout responsivo e intuitivo</li>
                </ul>
            </article>

            <!-- Technologies -->
            <article>
                <h2 class="text-2xl font-bold mb-3">Tecnologias</h2>
                <ul class="grid grid-cols-3 gap-6 text-center">
                    <li><i class="fab fa-php text-8xl text-violet-700"></i></li>
                    <li><i class="fab fa-laravel text-8xl text-red-700"></i></li>
                    <li><i class="fa fa-wind text-8xl text-sky-500"></i></li>
                    <li><i class="fab fa-js text-8xl text-yellow-400"></i></li>
                    <li><i class="fab fa-html5 text-8xl text-red-500"></i></li>
                    <li><i class="fab fa-css3-alt text-8xl text-sky-600"></i></li>
                    <li><i class="fa fa-database text-8xl text-green-600"></i></li>
                </ul>
            </article>
        </section>
    </section>
    </main>
</body>
</html>
