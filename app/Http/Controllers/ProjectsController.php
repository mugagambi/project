<?php

namespace App\Http\Controllers;
use App\Project;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;


class ProjectsController extends Controller
{
    public function index()
    {
       
    
       // $projects = Project:: where('owner_id',auth()->id())->get();


        // cache()->rememberForever('stats',function(){
        //     return['hours'=> 45000,'lessons'=>450000, 'series'=> 2355];
        // });

         
        return view('projects.index',[
            'projects' => auth()->user()->projects
        ]);
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
        $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();

         $project = Project::create($attributes); 

         event(new ProjectCreated($project));
       
    
       return redirect('/projects');
   }


   public function edit(Project $project)
   {
       
       return view('projects.edit', compact('project'));
   }

   public function update(Project $project)
   {
  
    $project->update($this->validateProject()) ;
    
    return redirect('/projects');
       
   }

   public function destroy(Project $project)
   {
       Project::findOrFail($id)->delete();   
       return redirect('/projects'); 
   }

   public function validateProject(){
  return request()-> validate([
        'title'=> ['required','min:3'],
        'description' => ['required','min:3']
    ]);
   }
}
 