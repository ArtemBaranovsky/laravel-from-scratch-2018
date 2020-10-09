<?php

namespace App\Http\Controllers;

use App\Project;
use App\Services\Twitter;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('auth')->only(['store', 'update']);
        $this->middleware('auth')/*->except(['show'])*/;
    }

    public function index()
    {
//        $projects = Project::all();
        $projects = Project::where('owner_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
//        request()->validate([
/*        $validated = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
        ]);
        Project::create($validated);*/
//        Project::create(request(['title', 'description']));
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]);
        $attributes['owner_id'] = auth()->id();
//        Project::create(request()->validate([
//            'title' => ['required', 'min:3'],
//            'description' => ['required', 'min:3'],
//        ]));
//        Project::create($attributes + ['owner_id' => auth()->id()]);
        Project::create($attributes);
        return redirect('/projects');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
//    public function show(Project $project, Filesystem $file)
//    public function show(Project $project, $twitter)  // error
    public function show(Project $project, Twitter $twitter)
    {
//        app('Illuminate\Filesystem\Filesystem');
//        $filesystem = app('Illuminate\Filesystem\Filesystem');
//        $twitter = app('twitter');
//        dd($twitter);
        return view('projects.show', compact('project'));
    }
/*    public function show(Filesystem $file)
    {
//        dd($file);
//        dd($file->get());
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
//        $project = Project::findOrFail($id);
        //        return $project;
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
//        dd($request->all());
//        $project = Project::findOrFail($id);

//        $project->title = $request['title'];
//        $project->description = $request['description'];
//        $project->save();

        $project->update(request(['title', 'description']));
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
//        $project = Project::findOrFail($id)->delete();
        $project->delete();
        return redirect('/projects');
    }
}
