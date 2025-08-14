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
</head>

<body>
    <div class="tab">
        <button class="tablinks" onclick="openForm('login')">Login</button>
        <button class="tablinks" onclick="openForm('cadastro')">Cadastro</button>
    </div>

    <form action="" id="login" class="active">
        <h1>Login</h1>
        <input type="email" placeholder="Email"><br>
        <input type="password" placeholder="Senha"><br>
    </form>

    <form action="" id="cadastro">
        <h1>Cadastro</h1>
        <input type="text" placeholder="Nome"><br>
        <input type="email" placeholder="Email"><br>
        <input type="password" placeholder="Senha"><br>
    </form>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
