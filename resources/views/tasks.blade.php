@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Task
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Task Form -->
					<form action="/task" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Task Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Task</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="task-description" class="col-sm-3 control-label">Description</label>

							<div class="col-sm-6">
								<input type="text" name="description" id="task-description" class="form-control" value="{{ old('task') }}">
							</div>
							</div>





<div class="form-group">
<label for="task-priority" class="col-sm-3 control-label">Priority</label>
<label class="radio-inline"><input type="radio" name="priority" value="3" id="task-priority">Low</label>
<label class="radio-inline"><input type="radio" name="priority" value="2" id="task-priority">Medium</label>
<label class="radio-inline"><input type="radio" name="priority" value="1" id="task-priority">High</label>



</div>						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>Add Task
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Tasks -->
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Tasks
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Task</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($tasks as $task)
									<tr>
                                                                            <td class="table-text"><div><a href="/task/{{$task->id}}">{{ $task->name }}</a></div></td>

										<!-- Task Delete Button -->
										<td>
											<form action="/task/{{ $task->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
