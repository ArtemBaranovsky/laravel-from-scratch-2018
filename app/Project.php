<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'owner_id'
    ];

//    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::created(function($project){
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
/*        static::updated(function($project){
            // do something else
        });
        static::deleted(function($project){
            // do something else
        });*/
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

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
