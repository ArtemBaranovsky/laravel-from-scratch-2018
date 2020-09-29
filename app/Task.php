<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
//    protected $fillable = [];
    protected $guarded = [];

    public function complete($completed = true)
    {
//        $this->update(['completed' => true ]);
//        $this->update(['completed' => $completed ]);
        $this->update(compact('completed'));
    }

    public function incomplete()
    {
//        $this->update(['completed' => true ]);
        $this->complete(false);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
