<?php

namespace App\Listeners;


use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated as ProjectCreatedMail;


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
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        Mail::to($event->$project->owner->email)->send(
            new ProjectCreatedMail($event->$project)
        );
        
    
    }
}
