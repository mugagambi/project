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

    public function __construct(){
        $this->middleware('auth');

    }

    public function create()
   {
       return view('projects.create');
   } 

   public function show(Project $project)
   {

    // if($project->owner_id !== auth()->id()){  method one of authorization
    //     abort(403);
    // }
    // abort_if($project->owner_id !== auth()->id(),403); method two

    $this->authorize('update',$project);
    
    return view('projects.show',compact('project'));
       
   } 

   public function store()
   { 
        $attributes = request()-> validate([
            'title'=> ['required','min:6'],
            'description' => ['required','min:6']
        ]);

        $attributes['owner_id'] = auth()->id();

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
 