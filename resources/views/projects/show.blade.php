@extends('layout')

@section('content')
    <h1 class="title">Project {{ $project->title }}</h1>
    <div class="content">
        {{ $project->description }}
        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
        </p>
        @if($project->tasks->count())
            <div>
                @foreach($project->tasks as $task)
                    <li>{{ $task->description }}</li>
                @endforeach
            </div>
        @endif
    </div>
@endsection
