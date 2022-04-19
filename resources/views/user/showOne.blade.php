<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>

<h3>Просмотр профиля юзера</h3>

Имя: {{ $user->name }}<br>
Email: {{ $user->email }}

@auth()
    @if(auth()->user()->is_admin)
        <form action="" method="post">
            @csrf
            @if($user->is_active == 1)
                <input name="hidden" type="hidden" value="0">
                <input name="button" type="submit" value="забанить">
            @else
                <input name="hidden" type="hidden" value="1">
                <input name="button" type="submit" value="разбанить">
            @endif
        </form>
    @endif
@endauth

</body>
</html>
