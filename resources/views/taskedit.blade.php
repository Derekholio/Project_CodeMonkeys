@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('resources/css/taskview.css')}}" rel="stylesheet" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@section('content')
    <div class="container-fluid fullscreen">
        <div class="col-lg-5">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    Task Properties
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="task_form">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Task:</label>
                            <span class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{$task->name}}"/>
                            </span>
                        </div>
                        <hr class="task-hr"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Created at:</label><span class="col-sm-10">
                                <input type="text" name="created_at" class="form-control" value="{{$task->created_at}}" readonly/>
                            </span>
                        </div>
                        <hr class="task-hr"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description:</label>
                            <span class="col-sm-10">
                                <input type="text" name="description" class="form-control" value="{{$task->description}}"/>
                            </span>
                        </div>
                        <hr class="task-hr"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Assignee:</label>
                            <span class="col-sm-10">
                                <select name="assignee" class="form-control">
                                    <option value="0">Not assigned</option>
                                    @foreach($users as $user)
                                        @if($task->user != null && ($task->user->email == $user->email))
                                            <option value="{{$user->id}}" selected>{{$user->email}}</option>
                                        @else
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <hr class="task-hr"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status:</label>
                            <span class="col-sm-10">
                                <select name="status" class="form-control">
                                    @foreach($status as $s)
                                        @if($s->status_text == $task->status->status_text)
                                            <option value="{{$s->id}}" selected>{{$s->status_text}}</option>
                                        @else
                                            <option value="{{$s->id}}">{{$s->status_text}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <hr class="task-hr"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Priority:</label>
                            <span class="col-sm-10">
                                <select name="priority" class="form-control">
                                    @foreach($priorities as $priority)
                                        @if($priority->priority_text == $task->priority->priority_text)
                                            <option value="{{$priority->id}}" selected>{{$priority->priority_text}}</option>
                                        @else
                                            <option value="{{$priority->id}}">{{$priority->priority_text}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <hr class="task-hr"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Due date:</label>
                            <span class="col-sm-10">
                                <input type="date" name="duedate" id="task-date" class="form-control" value="{{$task->due}}">
                            </span>
                        </div>
                        <hr class="task-hr"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Color:</label>
                            <span class="col-sm-10">
                                <select name="color" class="form-control">
                                    @foreach($colors as $color)
                                        @if($task->color->color_text == $color->color_text)
                                            <option value="{{$color->id}}" selected>{{$color->color_text}}</option>
                                        @else
                                            <option value="{{$color->id}}">{{$color->color_text}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="panel panel-default /*fullscreen-y*/">
                <div class="panel-heading">
                    Discussion Board
                </div>
                <div class="discussion panel-body">
                    @foreach ($discussions as $discussion)
                        <span class="col-sm-11" title='Posted at {{$discussion->posted_time}}'>
                            <strong>{{$discussion->user->email}}</strong>: {{$discussion->message}}</span>
                        <span class="col-sm-1">
                            <form action="/task/{{$task->id}}/deletechat/{{$discussion->id}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </span>
                        <br />
                        <hr>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Task Operations
                </div>
                <div class="panel-body">
                    <form action="/task/{{$task->id}}/edit" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <button type="submit" class="btn btn-info" form="task_form" formmethod="POST">
                            <i class="fa fa-floppy-o"></i>Save
                        </button>
                    </form>
                    <hr class="task-hr" />
                    <form action="/task/{{$task->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection