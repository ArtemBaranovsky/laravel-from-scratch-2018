@extends('layout')

@section('content')
    <h1 class="title">Project {{ $project->title }}</h1>
    <div class="content">
        {{ $project->description }}
        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
        </p>
        @if($project->tasks->count())
            <div class="box" >
                @foreach($project->tasks as $task)
                    <div>
                        <form method="POST" action="/completed-tasks/{{ $task->id }}">
{{--                            @method('PATCH')--}}
                            @if($task->completed)
                                @method('delete')
                            @endif
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
        {{-- add a new task form--}}
        <form class="box" method="POST" action="/projects/{{ $project->id }}/tasks">
            @csrf
            <div class="field">
                <label for="description" class="label">New Task</label>
                <div class="control">
                    <input type="text" class="input" name="description" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link" id="">Add Task</button>
                </div>
            </div>

            @include('errors')
        </form>
    </div>
@endsection
