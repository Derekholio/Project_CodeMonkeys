@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('resources/css/taskview.css')}}" rel="stylesheet" text="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container-fluid fullscreen">
    <div class="col-lg-3">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Task Properties
            </div>
            <div class="panel-body">
                Task ID: {{$task->id}} <br />
                <hr class="task-hr"/>
                Task: {{$task->name}} <br />
                <hr class="task-hr"/>
                Created at: {{$task->created_at}} <br />
                <hr class="task-hr"/>
                Description: {{$task->description}} <br />
                <hr class="task-hr"/>
                Assignee: {{$task->user->email or 'Not assigned'}} <br />
                <hr class="task-hr"/>
                Priority: {{$task->priority->priority_text}} {!!$task->priority->priority_icon_html!!}<br />
                <hr class="task-hr"/>
                Due date: {{$task->due}} <br />
                <hr class="task-hr"/>
                Category: {{$task->category_id}} <br />
                <hr class="task-hr"/>
                Color: {{$task->color->color_text}} <br />
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default /*fullscreen-y*/">
            <div class="panel-heading">
                Discussion Board
            </div>
            <div class="discussion panel-body">
                @foreach ($discussions as $discussion)
                <span title='Posted at {{$discussion->posted_time}}'><strong>{{$discussion->user->email}}</strong>: {{$discussion->message}}</span><br />
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
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Task History
            </div>
            <div class="panel-body">
                See some task history here
            </div>
        </div>
    </div>
</div>
@endsection