<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'owner_id'
    ];

//    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
//        $this->tasks()->create(['description' => $description]);
//        $this->tasks()->create(compact('description'));
        $this->tasks()->create($task);
//        return Task::create([
//            'project_id' => $this->id,
//            'description' => $description
//        ]);
    }
}
