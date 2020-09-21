@extends('layout')

@section('content')
<h1>Create a new Projects</h1>
    <form action="/projects" method="post">
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" required placeholder="Project Title"
                   class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                   value="{{ old('title') }}"
            >
        </div>
        <div>
            <textarea name="description" placeholder="Project Description" required rows="10"
                      class="input {{ $errors->has('description') ? 'is-danger' : '' }}"
            >{{ old('description') }}</textarea>
        </div>
        <div>
            <button type="submit">Create Project </button>
        </div>
        @include('errors')
    </form>
@endsection
