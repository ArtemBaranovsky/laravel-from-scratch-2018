@extends('layout')

@section('content')
    <h1 class="title">Edit Project </h1>
    <form action="/projects/{{ $project->id }}" method="post" style="margin-bottom: 1em;">
{{--        {{ method_field('patch') }}--}}
{{--        {{ csrf_field() }}--}}
        @method('patch')
        @csrf
        <div class="field">
            <label for="title">Title</label>
            <div class="control">
                <input type="text"  class="input" name="title" placeholdeer="Title" value="{{ $project->title }}">
            </div>
        </div>
        <div class="field">
            <label for="description">Description</label>
            <div class="control">
                <textarea name="description" class="textarea">{{ $project->description }}</textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
    </form>

    @include('errors')

    <form action="/projects/{{ $project->id }}" method="post">
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Project</button>
            </div>
        </div>
    </form>
@endsection
