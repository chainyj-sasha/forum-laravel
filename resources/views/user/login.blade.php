<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма авторизации</title>
</head>
<body>

@if(session('error'))
    {{ session('error') }}
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<h3>Форма авторизации</h3>

<form action="" method="post">
    @csrf
    <input name="email" type="email" value="{{ old('email') }}"> Адрес электронной почты<br><br>
    <input name="password" type="password"> Пароль<br><br>
    <input name="button" type="submit">
</form>

</body>
</html>
