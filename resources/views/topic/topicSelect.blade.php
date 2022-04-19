@extends('layout.main')

@section('title', $title)

@section('content')

    <h3>Список тем выбранного раздела</h3>

    <ul>
        @foreach($topics as $topic)
            <li><a href="/topic/{{ $topic->id }}">{{ $topic->name }}</a></li>
        @endforeach
    </ul>
    <p>{{ $topics->links() }}</p>



    @auth()

        <form action="" method="post">
            @csrf
            <textarea name="name" cols="30" rows="5"></textarea>Новая тема<br><br>
            <input name="button" type="submit">
        </form>

    @endauth

@endsection
