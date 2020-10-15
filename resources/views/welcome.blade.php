@extends('layout')

@section('title', 'Home')

@section('content')
    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <h1>Here we go!!!</h1>
{{--    <ul>--}}
{{--        @foreach($tasks as $task)--}}
{{--        <li>{{ $task }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
    <div id="app" {{--class="flex-center position-ref full-height"--}}>
        <example-component></example-component>
    </div>
    <script src="/js/app.js"></script>

@endsection
