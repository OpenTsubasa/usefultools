@extends('layouts.app')

@section('title', 'ToDoApp - All Tasks')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <p>
    	<a class="btn btn-sm btn-info" href="{{ route('todoapp.add_task') }}">Add New Task</a>
    </p>
    @if (count($tasks) > 0)
	<h1>All Tasks</h1>
	<hr>
	<table class="table table-sm table-bordered table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Details</th>
				<th>Mark Complete</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
        	<tr>
				<td>
					@if($task->is_complete)
						<strike>{{ $task->name }}</strike>
					@else
						{{ $task->name }}
					@endif
				</td>
				<td>
					@if($task->is_complete)
						<strike>{{ $task->details }}</strike>
					@else
						{{ $task->details }}
					@endif
				</td>
				<td>
					@if($task->is_complete)
						<form action="{{ route('todoapp.not_complete_task') }}" method="post">
							@csrf
							<input type="hidden" name="id" value="{{ $task->id }}">
		            		<input class="btn btn-sm btn-secondary" type="submit" name="not_complete" value="Mark Not Complete" onclick="return confirm('Are you sure to mark the task \'{{ $task->name }}\' as not complete?')">
		            	</form>
					@else
						<form action="{{ route('todoapp.complete_task') }}" method="post">
							@csrf
							<input type="hidden" name="id" value="{{ $task->id }}">
		            		<input class="btn btn-sm btn-primary" type="submit" name="complete" value="Mark Complete" onclick="return confirm('Are you sure to mark the task \'{{ $task->name }}\' as complete?')">
		            	</form>
					@endif
				</td>
				<td>
					<a class="btn btn-sm btn-warning" href="{{ route('todoapp.edit_task', $task->id) }}">Edit</a>
				</td>
				<td>
					<form action="{{ route('todoapp.delete_task') }}" method="post">
						@csrf
						<input type="hidden" name="id" value="{{ $task->id }}">
	            		<input class="btn btn-sm btn-danger"  type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure to delete the task \'{{ $task->name }}\'?')">
	            	</form>
				</td>
			</tr>
        @endforeach
		</tbody>
	</table>
	@else
	<h1>No task has been created yet!</h1>
	@endif
	</div>
	</div>
</div>
@endsection