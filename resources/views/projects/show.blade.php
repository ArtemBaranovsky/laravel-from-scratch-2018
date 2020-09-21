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
                    <div>
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @method('PATCH')
                            @csrf
                            <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
{{--                            <label class="checkbox" for="completed" style="{{ $task->completed ? 'text-decoration: line-through' : '' }}">--}}
                                <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                {{ $task->description }}
                            </label>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
