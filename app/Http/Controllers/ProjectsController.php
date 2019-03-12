<?php

namespace App\Http\Controllers;
use App\Project;
use App\Mail\ProjectCreated;


class ProjectsController extends Controller
{
    public function index()
    {
    
        $projects = Project:: where('owner_id',auth()->id())->get();


        // cache()->rememberForever('stats',function(){
        //     return['hours'=> 45000,'lessons'=>450000, 'series'=> 2355];
        // });

         
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

   $project = Project::create($attributes); 
            \Mail::to('dorcaskemuma833@gmail.com')->send(
               new ProjectCreated($project)
            );
    
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
 