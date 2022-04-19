@extends('layout.main')

@section('title', $title)

@section('content')

    <h3>Список разделов форума:</h3>

    <ul>
        @foreach($sections as $section)
            <li><a href="/section-{{$section->name}}">{{ $section->name }}</a></li>
        @endforeach
    </ul>

@endsection
