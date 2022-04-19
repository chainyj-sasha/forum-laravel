<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
</head>
<body>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<h3>Форма регистрации нового пользователя</h3>

<form action="" method="post">
    @csrf
    <input name="name" type="text" placeholder="Имя"> Введите имя<br><br>
    <input name="email" type="email" placeholder="email"> Введите email<br><br>
    <input name="password" type="password"> Придумайте пароль<br><br>
    <input name="password_confirmation" type="password"> Повторите пароль<br><br>
    <input name="button" type="submit" value="Зарегистрировать">
</form>

</body>
</html>
