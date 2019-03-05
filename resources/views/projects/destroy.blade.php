@extends('layout')



@section('content')




<form method="POST" action="/projects/{{$project->id}}">
{{ csrf_field() }}
{{ method_field('DELETE') }}
    <div class="field">
        <label class="label" for="title">Title</label>


        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title}}">
        </div>

    </div>

    <div class="field">
        <label class="label" for="description">Description</label>

         <div class="control">
           <textarea name="description" class="textarea">{{ $project-> description}}</textarea>
        </div>

    </div>

    <div class="field">
        <div class="control">
           <a href="">Delete Project</a>
        </div>
    </div>
</form>

@endsection