<?php

namespace App\Listeners;

use App\Events\ProjectCreated as ProjectCreatedEvent;
use App\Mail\ProjectCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendProjectCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreatedEvent  $event
     * @return void
     */
    public function handle(ProjectCreatedEvent $event)
    {

//        Mail::to($project->owner->email)->send(
        Mail::to($event->project->owner->email)->send(
//            new \App\Mail\ProjectCreated($project)
            new ProjectCreated($event->project)
        );
    }
}
