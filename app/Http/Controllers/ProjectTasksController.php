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

//        $task->update([
//            'completed' => request()->has('completed'),
//        ]);
//        $task->complete();
//        $task->complete(request()->has('completed')); // 1-st opt. method via request

//        if (request()->has('completed')) {            // 2-nd opt. - if-else methods
//            $task->complete();
//        } else {
//            $task->incomplete();
//        }

//        request()->has('completed') ? $task->complete() : $task->incomplete(); // 3 opt - ternar
        $method = request()->has('completed') ? 'complete' : 'incomplete';  // 4 opt.  -via dynamic method
        $task->$method();
        //        return redirect('/projects');
        return back();
    }
    public function store(Project $project)
    {
/*        Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]);*/
        //        $project->addTask(request('description'));

//        $this->tasks()->create($task);
        $project->tasks()->create(request());
        $project->addTask(request()->validate(['description' => 'required|max:255']));
        return back();
    }
}
