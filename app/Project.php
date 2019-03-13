<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $guarded = [];








    public function owner(){
        return $this->belongsTo(User::class);
    }



    public function tasks(){
        return $this->hasMany(Task::class);
     }

     public function addTask($task){
         $this->tasks()->create($task);
        //  Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description
        // ]);
     }
}


   