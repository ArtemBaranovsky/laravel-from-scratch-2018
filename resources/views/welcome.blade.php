@extends('layout')

@section('title', 'Home')

@section('content')
    <h1>Here we go!!!</h1>
    <ul>
        @foreach($tasks as $task)
        <li>{{ $task }}</li>
        @endforeach
    </ul>
@endsection
