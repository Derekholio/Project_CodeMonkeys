@extends('layouts.app')

@section('content')
	<div align="center" class="container-fluid fullscreen centered" >
		@if(count($tasks) == 0)
			<div class="col-lg-12">
				<div class="alert alert-info col-lg-4 col-lg-offset-4">
					You don't have any tasks yet. Click <a href="/newtask">"New Task"</a> to get started!
				</div>
			</div>
		@endif
		<div class="col-lg-4 col-lg-offset-0">
			<!-- Current Tasks -->
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
											<a href="/task/{{$task->id}}"><font color="black">{{$task->name}}</font></a>
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
		</div>

<!-- Doing -->
		<div class="col-lg-4 col-lg-offset-0">
			<!-- Current Tasks -->
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
											<a href="/task/{{$task->id}}"><font color="black">{{$task->name}}</font></a>
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
		</div>

<!-- Completed -->

		<div class="col-lg-4 col-lg-offset-0">
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
										<a href="/task/{{$task->id}}"><font color="black">{{$task->name}}</font></a>
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
		</div>

	</div>
@endsection
