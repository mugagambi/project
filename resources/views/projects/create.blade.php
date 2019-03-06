@extends('layout')

@section('content')

		<h1 class="title"> Create a New Project </h1>
	   
		   
			<form method="POST" action="/projects">
			{{ csrf_field() }}

			<div class="field">
				<label for="title" class="label"Project Title></label>

				<div class="control">
					<input type="text" name = "title" placeholder="project title"  class ="input {{ $errors->has('title') ? 'is-danger':''}}" value="{{old('title')}}">
				
				</div>
				</div>




				<div class="field">
					<label for="description"class="label"></label>
				 <div class="control">
				   <textarea name="description" class = "textarea {{ $errors->has('description') ? 'is-danger':''}}" placeholder="Project Description" >{{old('description')}}</textarea>
				</div>
				</div>

			
			<div class="field">
			<div class="control">
				<button type="submit">Create Project</button>
			</div>
			</div>
			
			@if ($errors->any())
			<div class="notification is-danger">
				<ul>

				@foreach($errors->all() as $error)
				<li>
					{{ $error}}
				</li>
				@endforeach
				</ul>
			</div>
			@endif	

			</form>
			

			@endsection
			
	

		
