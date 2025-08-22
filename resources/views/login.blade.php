<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <style>
        form {
            display: none;
        }

        .active {
            display: block;
        }

        .active-btn {
            background-color: rebeccapurple;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="tab">
        <button class="tablinks" onclick="openForm('login')">Login</button>
        <button class="tablinks" onclick="openForm('cadastro')">Cadastro</button>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('auth.login') }}" id="login" class="active" method="POST">
        <h1>Login</h1>
        @csrf
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Senha"><br>
        <button type="submit">Entrar</button>
    </form>

    <form action="{{ route('auth.register') }} " id="cadastro" method="POST">
        <h1>Cadastro</h1>
        @csrf
        <input type="text" name="name" placeholder="Nome"><br>
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Email"><br>

        <input type="password" name="password" placeholder="Senha"><br>

        <button type="submit">Entrar</button>
    </form>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
