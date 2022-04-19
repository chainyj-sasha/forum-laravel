@extends('layout.main')

@section('title', $title)

@section('content')

    <h3>Обсуждаемая тема: </h3>

    <h4>Сообщения:</h4>

    <ol>
        @foreach($posts as $post)
            <li>
                {{ $post->text }}<br>
                @if(auth()->check())
                    @if($post->user->id == auth()->user()->id)
                        <a href="/editPost/{{ $post->id }}">редактировать</a><br>
                        <a href="/delete_post/{{ $post->id }}">удалить пост</a>
                    @endif<br>
                    @if(auth()->user()->is_admin == 1)
                        <a href="/delete_post/{{ $post->id }}">удалить пост</a>
                    @endif
                @endif
                автор: <a href="/profile/{{ $post->user->id }}"><b>{{ $post->user->name }}</b> </a><br>
                время: {{ $post->updated_at  }}
                <hr>
            </li>
        @endforeach
    </ol>

    <p>{{ $posts->links() }}</p>


    @auth()
        <h4>Поле для ввода нового сообщения</h4>
        <form action="" method="post">
            @csrf
            <textarea name="text" cols="30" rows="10" placeholder="текст"></textarea> Текст сообщения<br><br>
            <input name="button" type="submit">
        </form>
    @endauth

@endsection
