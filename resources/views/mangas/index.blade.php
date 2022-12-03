@extends('layouts.app')


@section('content')
    <h1>Liste des mangas</h1>
    <ul>
        @foreach ($mangas as $manga)
        <li><a href="{{ route('manga-show', $manga) }}">{{ $manga->title }}</a></li>
        @endforeach
    </ul>
@endsection
