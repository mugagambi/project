<?php

namespace App\Policies;

use App\User;
use App\project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  \App\project  $project
     * @return mixed
     */
    public function update(User $user, project $project)
    {
        return $project->owner_id == $user->id;
    }

   
    
}
