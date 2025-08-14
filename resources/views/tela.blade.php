<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://localhost/icons/fontawesome/css/all.min.csss">
  <link rel="stylesheet" href="https://localhost/icons/bootstrap-icons/font/bootstrap-icons.csss">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-linear-120 bg-fixed from-violet-200 via-indigo-300 to-yellow-200  h-[100vh] ">
    <main class="flex ">
        <form action="" id="login" class="active">
            <h1>Login</h1>
            <input type="email" placeholder="Email"><br>
            <input type="password" placeholder="Senha"><br>
        </form>
    </main>
</body>
</html>