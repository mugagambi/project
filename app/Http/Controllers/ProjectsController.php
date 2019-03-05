<?php

namespace App\Http\Controllers;
use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

         
        return view('projects.index', compact('projects'));
    }

    public function create()
   {
       return view('projects.create');
   } 

   public function store()
   {
       $project = new Project();

       $project-> title= request('title');
       $project-> description= request('description');
       $project-> save();

       return redirect('/projects');
   }


   public function edit($id)
   {
       $project = Project::find($id);
       return view('projects.edit', compact('project'));
   }

   public function update($id)
   {
    $project = Project::find($id);
    $project->title = request('title');
    $project->description = request('description');

    $project->save();

    return redirect('/projects');
       
   }

   public function destroy()

   {
   //    
   }
}
 