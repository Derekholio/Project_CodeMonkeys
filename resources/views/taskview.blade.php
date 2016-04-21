@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('resources/css/taskview.css')}}" rel="stylesheet" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container-fluid fullscreen">
    <div class="col-lg-5">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Task Properties
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Task:</label><span class="col-sm-10">{{$task->name}}</span> <br />
                    <hr class="task-hr"/>
                    <label class="col-sm-2 control-label">Created:</label><span class="col-sm-10">{{$task->created_at}}</span> <br />
                    <hr class="task-hr"/>
                    <label class="col-sm-2 control-label">Description:</label><span class="col-sm-10">{{$task->description}}</span> <br />
                    <hr class="task-hr"/>
                    <label class="col-sm-2 control-label">Assignee:</label><span class="col-sm-10">{{$task->user->name or 'Not assigned'}}</span> <br />
                    <hr class="task-hr"/>
                    <label class="col-sm-2 control-label">Status:</label><span class="col-sm-10">{{$task->status->status_text or 'nah'}}</span> <br />
                    <hr class="task-hr"/>
                    <label class="col-sm-2 control-label">Priority:</label><span class="col-sm-10">{{$task->priority->priority_text}} {!!$task->priority->priority_icon_html!!}</span><br />
                    <hr class="task-hr"/>
                    <label class="col-sm-2 control-label">Due:</label><span class="col-sm-10">{{$task->due}}</span> <br />
                    <hr class="task-hr"/>
                    <label class="col-sm-2 control-label">Color:</label> <span class="col-sm-10"><font color={{$task->color->color_text}}>{{$task->color->color_text}}</font></span> <br />
                </div>
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
                <span title='Posted at {{$discussion->posted_time}}'><strong>{{$discussion->user->name}}</strong>: {{$discussion->message}}</span><br />
                    <hr>
                @endforeach
                <form action="/task/{{$task->id}}/postchat" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <textarea name="discussion" class="fullscreen-x form-control"></textarea>
                        <button class="pull-right form-control" style="margin-top: 3px;" type="submit" value="Submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Task Operations
            </div>
            <div class="panel-body">
                <form action="/task/{{$task->id}}/edit" method="GET">
                    {{ csrf_field() }}
                    {{ method_field('GET') }}
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-pencil"></i>Edit
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
