@extends('layouts.app')


@section('content')
    <h1>{{ $manga->title }}</h1>
    <ul>
        @foreach ($manga->categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul>
    <div>
        @foreach ($manga->characters as $character)
        <div>
            <h3>{{ $character->name }}</h3>
            <img src="{{ $character->picture }}" alt="{{ $character->name }}">
            <p>{{ $character->biography }}</p>
        </div>
        @endforeach
    </div>
@endsection
