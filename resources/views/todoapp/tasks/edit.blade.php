@extends('layouts.app')

@section('title', 'ToDoApp - Edit Task')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <p>
    	<a class="btn btn-sm btn-info" href="{{ route('todoapp.all_tasks') }}">All Tasks</a>
    </p>
	<h1>Edit Task</h1>
	@if ($errors->any())
	<hr>
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<hr>
	<form action="{{ route('todoapp.edit_task_post') }}" method="post">
		@csrf
		<input type="hidden" name="id" value="{{ $task->id }}">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Task Name: &nbsp;</span>
			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" value="{{ $task->name }}" required>
		</div>
		<div class="input-group">
			<span class="input-group-text">Task Details: </span>
			<textarea class="form-control" aria-label="With textarea" name="details" required>{{ $task->details }}</textarea>
		</div>
		<div class="pt-3 pb-3">
			<input class="btn btn-primary" type="submit" name="edit">
		</div>
	</form>
	</div>
	</div>
</div>
@endsection