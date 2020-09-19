<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        Project::create(request(['title', 'description']));
//        dd(request(['title', 'description']));
//        dd(request()->all());
//        return [
//            'title' => request('title'),
//            'description' => request('description')
//        ];
//        Project::create(request()->all());
//        return 'done';

//        Project::create([
//            'title' => request('title'),
//            'description' => request('description')
//        ]);

//        $project = new Project();
//        $project->title = request('title');
//        $project->description = request('description');
//        $project->save();
        return redirect('/projects');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

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
