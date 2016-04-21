@extends('layouts.app')

@section('content')
	<div align="center" class="container-fluid fullscreen centered" >
		<div class="col-lg-3">
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
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>

<!-- Doing -->
		<div class="col-lg-3">
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
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>

<!-- Completed -->

		<div class="col-lg-3">
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
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>

	</div>
@endsection
