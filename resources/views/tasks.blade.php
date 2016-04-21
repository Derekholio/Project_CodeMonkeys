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
								@if($task->status == null || $task->status == 0)
								<tr>
									<td class="table-text">
										<div>
											@if($task->color_id == 1)
												<mark style="background-color: red; color: white"><a style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 2)
												<mark style="background-color: blue; color: white"><a style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 3)
												<mark style="background-color: green; color: white"><a  style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 4)
												<mark style="background-color: yellow"><a href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 5)
												<mark style="background-color: orange"><a href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@endif
										</div>
									</td>
									<td>
										<div>{{$task->priority->priority_text}} {!!$task->priority->priority_icon_html !!}</div>
									</td>
									<td>
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
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tasks as $task)
								@if($task->status == 1)
								<tr>
									<td class="table-text">
										<div>
											@if($task->color_id == 1)
												<mark style="background-color: red; color: white"><a style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 2)
												<mark style="background-color: blue; color: white"><a style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 3)
												<mark style="background-color: green; color: white"><a  style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 4)
												<mark style="background-color: yellow"><a href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 5)
												<mark style="background-color: orange"><a href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@endif
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
									<td>
										<form action="/task/{{ $task->id }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('Progress') }}

											<button type="submit" class="btn btn-default">
												<i class="fa glyphicon-menu-right"></i>Delete
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
								@if($task->status == 2)
								<tr>
									<td class="table-text">
										<div>
											@if($task->color_id == 1)
												<mark style="background-color: red; color: white"><a style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 2)
												<mark style="background-color: blue; color: white"><a style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 3)
												<mark style="background-color: green; color: white"><a  style="color: white" href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 4)
												<mark style="background-color: yellow"><a href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@elseif($task ->color_id == 5)
												<mark style="background-color: orange"><a href="/task/{{$task->id}}">{{ $task->name }}</a></mark>
											@endif
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
