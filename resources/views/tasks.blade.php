@extends('layouts.app')

@section('content')
	<div align="center" class="container-fluid fullscreen centered" >
		<div class="col-lg-4 col-lg-offset-0">
			<!-- Current Tasks -->
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						New Tasks
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<tr>
									<th>Task</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tasks as $task)
								@if($task->status == null || $task->status == 0)
								<tr>
									<td class="table-text">
										<div>
											<a href="/task/{{$task->id}}">{{ $task->name }}</a>
										</div>
									</td>
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
								@endif
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>

<!-- Doing -->
		<div class="col-lg-4 col-lg-offset-0">
			<!-- Current Tasks -->
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						In Progress
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<tr>
									<th>Task</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tasks as $task)
								@if($task->status == 1)
								<tr>
									<td class="table-text">
										<div>
											<a href="/task/{{$task->id}}">{{ $task->name }}</a>
										</div>
									</td>
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
								@endif
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>

<!-- Completed -->

		<div class="col-lg-4 col-lg-offset-0">
			<!-- Current Tasks -->
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Completed
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<tr>
									<th>Task</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tasks as $task)
								@if($task->status == 3)
								<tr>
									<td class="table-text">
										<div>
											<a href="/task/{{$task->id}}">{{ $task->name }}</a>
										</div>
									</td>
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
								@endif
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>

	</div>
@endsection
