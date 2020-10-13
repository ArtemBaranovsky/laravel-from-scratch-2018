<?php

namespace App\Http\Controllers;

use App\Project;
use App\Services\Twitter;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Events\ProjectCreated as ProjectCreatedEvent;

class ProjectsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('auth')->only(['store', 'update']);
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
//        $user->projects;
//        User::find(10)->projects;
//        auth()->user()->projects;
//        $projects = auth()->user()->projects;

//        $projects = Project::where('owner_id', auth()->id())->get();
//        $projects = Project::where('owner_id', auth()->id())->take(1)->get();
//        dump($projects);
//        cache()->rememberForever('stats', function(){
//            return ['lessons' => 1300, 'hours' => 50000, 'series' => 100];
//        });
//        $stats = cache()->get('stats');
//        return view('projects.index', compact('projects'));
        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
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
//        $attributes = request()->validate([
//            'title' => ['required', 'min:3'],
//            'description' => ['required', 'min:3'],
//        ]);
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
//        Project::create(request()->validate([
//            'title' => ['required', 'min:3'],
//            'description' => ['required', 'min:3'],
//        ]));
//        Project::create($attributes + ['owner_id' => auth()->id()]);
//        Project::create($attributes);
        $project = Project::create($attributes);
//        event(new ProjectCreatedEvent($project));
//        \Mail::to('jeffrey@laracast.com')->send(
/*        Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
//            new ProjectCreated()    // we will add specifics later, but in real life you could send through for example the project, that was constructed
        );*/

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
//    public function show(? Project $project, Twitter $twitter)    // optional type hint
    {
//        app('Illuminate\Filesystem\Filesystem');
//        $filesystem = app('Illuminate\Filesystem\Filesystem');
//        $twitter = app('twitter');
//        dd($twitter);

//        $this->authorize('view', $project);
        $this->authorize('update', $project); // comment if you want your logic to respond to guest users
//        dd($project->owner_id, auth()->id());
//        if ($project->owner_id !== auth()->id()) {
//            abort(403);
//        }

//dd($project->owner_id, auth()->id());
//        abort_if(! auth()->user()->owns($project), 403);
//        abort_unless(auth()->user()->owns($project), 403);
//        abort_if($project->owner_id != auth()->id(), 403);
//        \Gate::allows();
//        \Gate::denies();
//        if (\Gate::denies('update', $project)) {
//            abort(403);
//        }
//        abort_if((\Gate::denies('update', $project)), 403);
//        abort_unless((\Gate::allows('update', $project)), 403);
//        auth()->user()->can('update', $project);
//        auth()->user()->cannot('update', $project);

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
        $this->authorize('update', $project);
        // TODO add validation here
//        $attributes = request()->validate([
//            'title' => ['required', 'min:3'],
//            'description' => ['required', 'min:3'],
//        ]);
//        $project->update(request(['title', 'description']));
        $project->update($this->validateProject());
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
        $this->authorize('update', $project);
        $project->delete();
        return redirect('/projects');
    }

    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]);
    }
}
