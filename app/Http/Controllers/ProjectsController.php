<?php

namespace App\Http\Controllers;
use App\Project;


class ProjectsController extends Controller
{
    public function index()
    {
    
        $projects = Project:: where('owner_id',auth()->id())->get();

         
        return view('projects.index', compact('projects'));
    }

    public function create()
   {
       return view('projects.create');
   } 

   public function show(Project $project)
   {
    
    return view('projects.show',compact('project'));
       
   } 

   public function store()
   { 
        $attributes = request()-> validate([
            'title'=> ['required','min:6'],
            'description' => ['required','min:6']
        ]);

   Project::create($attributes); 

    
       return redirect('/projects');
   }


   public function edit($id)
   {
       $project = Project::findOrFail($id);
       return view('projects.edit', compact('project'));
   }

   public function update($id)
   {

    $project->update(request(['title','description'])) ;
    
    return redirect('/projects');
       
   }

   public function destroy($id)
   {
       Project::findOrFail($id)->delete();   
       return redirect('/projects'); 
   }
}
 