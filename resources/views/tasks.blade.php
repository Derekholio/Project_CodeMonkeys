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
									<th>Priority</th>
									<th>Due Date</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tasks as $task)
								@if($task->status_id == null || $task->status_id == 0)
									<tr style="background-color:{{$task->color->color_html_tag}}">
										<td class="table-text">
											<div>
												<a href="/task/{{$task->id}}">{{$task->name}}</a>
											</div>
										</td>
										<!-- Task Delete Button -->
										<td class="table-text">
											<div>{{$task->priority->priority_text}} {!!$task->priority->priority_icon_html !!}</div>
										</td>
										<td class="table-text">
											<div>{{$task->due}}</div>
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
									<th>Priority</th>
									<th>Due Date</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tasks as $task)
								@if($task->status_id == 1)
									<tr style="background-color:{{$task->color->color_html_tag}}">
										<td class="table-text">
											<div>
												<a href="/task/{{$task->id}}">{{$task->name}}</a>
											</div>
										</td>
										<!-- Task Delete Button -->
										<td class="table-text">
											<div>{{$task->priority->priority_text}} {!!$task->priority->priority_icon_html !!}</div>
										</td>
										<td class="table-text">
											<div>{{$task->due}}</div>
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
									<th>Priority</th>
									<th>Due Date</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tasks as $task)
								@if($task->status_id == 2)
								<tr style="background-color:{{$task->color->color_html_tag}}">
									<td class="table-text">
										<div>
											<a href="/task/{{$task->id}}">{{$task->name}}</a>
										</div>
									</td>
									<!-- Task Delete Button -->
									<td class="table-text">
										<div>{{$task->priority->priority_text}} {!!$task->priority->priority_icon_html !!}</div>
									</td>
									<td class="table-text">
										<div>{{$task->due}}</div>
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
