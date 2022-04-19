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

<h3>Редактирование поста</h3>

<form action="" method="post">
    @csrf
    <textarea name="text" cols="30" rows="10">{{ $post->text }}</textarea><br><br>
    <input name="button" type="submit" value="редактировать">
</form>

<a href="/topic/{{ $post->topic->id }}">назад в тему</a>

</body>
</html>
