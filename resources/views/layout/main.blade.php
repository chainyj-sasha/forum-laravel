<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

@if(session('success'))
    {{ session('success') }}
@endif

@if(!auth()->check())
    <p>Вы не авторизованы</p>
    <a href="/login">авторизация</a><br>
    <a href="/register">регистрация</a>
@endif

@auth()
    Вы вошли как <b>{{ auth()->user()->name }}</b>
    <a href="/logout">разлогин</a>
@endauth

@yield('content')

</body>
</html>
