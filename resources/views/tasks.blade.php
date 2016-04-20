@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
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
		<div class="col-sm-offset-2 col-sm-8">
			<!-- Current Tasks -->
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						In Progress
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
