<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://localhost/icons/fontawesome/css/all.min.csss">
  <link rel="stylesheet" href="https://localhost/icons/bootstrap-icons/font/bootstrap-icons.csss">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-linear-120 bg-fixed from-violet-200 via-indigo-200 to-violet-100  h-[100vh] ">
    <main class="flex gap-3 p-4">
        <nav class="overflow-hidden relative bg-white flex flex-col gap-10 w-15 rounded-3xl px-2 py-6 shadow-2xl shadow-gray-300 h-142">
            <section class="">
                <div class="flex gap-4 items-center justify-between">

                    <i class="bi bi-arrows text-xl"> Task</i>
                    <span class="w-5 h-5 p-2 rounded-4xl flex items-center justify-center cursor-pointer">
                        <i class="fa fa-chevron-right "></i>
                    </span>
                </div>
            </section>

            <menu>
                <ul class="main-menu py-1">
                    <li class="py-2 px-1 rounded-2xl cursor-pointer transition-all">
                        <a href="">
                            <i class="fa fa-chart-line"></i>
                            <span><img src="{{ asset('images/avatar.jpg')}}" alt="avatar" class="object-cover w-12 rounded-[50%]"> Dashboard</span>
                        </a>
                    </li>
                    <li class="py-2 px-1 rounded-2xl cursor-pointer transition-all">
                        <a href="">
                            <i class="fa fa-user"></i>
                            <span><img src="{{ asset('images/avatar.jpg')}}" alt="avatar" class="object-cover w-12 rounded-[50%]"> Categories</span>
                        </a>
                    </li>
                    <li class="py-2 px-1 rounded-2xl cursor-pointer transition-all">
                        <a href="">
                            <i class="fa fa-box"></i>
                            <span><img src="{{ asset('images/avatar.jpg')}}" alt="avatar" class="object-cover w-12 rounded-[50%]"> Tasks</span>
                        </a>
                    </li>
                    <li class="py-2 px-1 rounded-2xl cursor-pointer transition-all">
                        <a href="">
                            <i class="fa fa-bell"></i>
                            <span><img src="{{ asset('images/avatar.jpg')}}" alt="avatar" class="object-cover w-12 rounded-[50%]"> Notifications</span>
                        </a>
                    </li>

                    <li class="py-2 px-1 rounded-2xl cursor-pointer transition-all">
                        <a href="">
                            <i class="fa fa-envelope"></i>
                            <span><img src="{{ asset('images/avatar.jpg')}}" alt="avatar" class="object-cover w-12 rounded-[50%]"> Email</span>
                        </a>
                    </li>

                </ul>
            </menu>
            <section class="">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/avatar.jpg')}}" alt="avatar" class="object-cover w-12 rounded-[50%]">
                    <h3>John Doe</h3>
                </div>
            </section>
            <section class="">
                <div class="flex items-center gap-1">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </div>
            </section>
        </nav>
        <main class="w-[100%] flex flex-col shrink">
            <!--<section class="bg-white min-w-[100%] rounded-4xl p-4 shadow-2xl shadow-gray-300">
                <h1 class="text-2xl font-[500]">Hello, UserName!</h1>
                <p>What do you plain Today?</p>
            </section>-->
            <section class="bg-white min-w-[100%] rounded-4xl py-2 px-7 mt-5">
                <h1 class="text-2xl font-2xl text-violet-800"><i class="fab fa-php"></i></h1>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/avatar.jpg')}}" alt="avatar" class="object-cover w-12 rounded-[50%]">
                    <h3>John Doe</h3>
                </div>
            </section>
            <section class="bg-white min-w-[100%] rounded-4xl p-7 mt-5 shadow-2xl shadow-gray-300">
                <section>
                    <h1 class="text-2xl">Adicionar uma nova Task</h1>
                    <form action="{{ route('tasks.store') }}" method="post" class="bg-slate-200 w-30 py-2 px-4 flex flex-col gap-1.5">
                        @csrf
                        <input type="hidden" name="user_id" value="">
                        <input type="hidden" name="category_id" value="">
                        <label for="title">Título</label>
                        <input type="text" name="title">

                        <label for="description">Descrição</label>
                        <textarea name="description" id="description" rows="5" class="resize-none"></textarea>

                        <label for="priority">Prioridade</label>
                        <select name="priority" name="priority">
                            <option value="100">Baixa</option>
                            <option value="200">Média</option>
                            <option value="300">Alta</option>
                        </select>
                        <label for="status">Status</label>
                        <select name="status">
                            <option value="100">Pendente</option>
                            <option value="200">Concluída</option>
                            <option value="300">Atrasada</option>
                            <option value="400">Cancelada</option>
                        </select>

                        <label for="due_date">Prazo p/ finalizar</label>
                        <input type="date" name="due_date">
                        <button type="submit">Salvar</button>
                    </form>

                </section>
            </section>
        </main>
    </main>
</body>
</html>