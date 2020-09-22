<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
//        dd('hello');
//        dd($task);
//        dd(request()->all());
        $task->update([
            'completed' => request()->has('completed'),
        ]);
//        return redirect('/projects');
        return back();
    }
    public function store(Project $project)
    {
/*        Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]);*/
        $attributes =  request()->validate(['description' => 'required|max:255']);
//        $project->addTask(request('description'));
        $project->addTask($attributes);
        return back();
    }
}
