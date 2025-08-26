<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/auth.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        <section id="box-container">
            <div id="tabBtns">
                <button onclick="toggleForm(event, 'login')"
                    class="active text-indigo-800 uppercase cursor-pointer font-medium px-5 py-2 rounded-full">Login</button>

                <button onclick="toggleForm(event, 'register')"
                    class="text-indigo-800 uppercase cursor-pointer font-medium px-4 py-2 rounded-full">Register</button>
            </div>
            <section class="tabContent hidden" id="login">
                <h1 class="title">Login</h1>
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="field-container">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email')}}">
                    </div>
                    <div>
                        <div class="field-container">
                            <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}">
                        </div>

                        <div class="mt-3 text-indigo-800">
                            <label for="remember">Lembre-me</label>
                            <input type="checkbox" name="remember" id="remember"
                                class="w-4 h-4 text-indigo-600 rounded-full focus:ring-indigo-600 ring-offset-gray-800 bg-indigo-700 border-gray-600" value="{{ old('remember') }}">
                        </div>
                    </div>

                    <button>Entrar</button>
                </form>
            </section>

            <section class="tabContent hidden" id="register">
                <h1 class="title">Register</h1>
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="field-container">
                        <input type="name" placeholder="Nome" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="field-container">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="field-container">
                        <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}">
                    </div>
                    <div class="field-container">
                        <input type="password" name="password_confirm" placeholder="Confirme a senha" value="{{ old('password_confirm') }}">
                    </div>

                    <button>Salvar</button>
                </form>
            </section>

        </section>
    </main>
    <script>
        function toggleForm(evt, formType) {
            // Esconde todos os formulários
            const tabContent = document.getElementsByClassName("tabContent");
            for (let i = 0; i < tabContent.length; i++) {
                tabContent[i].classList.add('hidden');
            }

            // Remove "active" de todos os botões
            const tabBtns = document.querySelectorAll("#tabBtns button");
            for (let i = 0; i < tabBtns.length; i++) {
                tabBtns[i].classList.remove("active", "text-white", "bg-indigo-800");
                tabBtns[i].classList.add("text-indigo-800");
            }

            // Mostra o formulário selecionado
            document.getElementById(formType).classList.remove('hidden');

            // Marca o botão atual como ativo
            evt.currentTarget.classList.add("active", "text-white", "bg-indigo-800");
            evt.currentTarget.classList.remove("text-indigo-800");
        }
    </script>
</body>

</html>
</body>

</html>
