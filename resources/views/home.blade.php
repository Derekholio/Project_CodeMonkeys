@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard : Your Tasks</div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <tr>
                                <th class="col-sm-1">Task</th>
                                <th class="col-sm-1">Priority</th>
                                <th class="col-sm-3">Description</th>
                                <th class="col-sm-1">Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr style="background-color:{{$task->color->color_html_tag}}">
                                    <td><a href="/task/{{$task->id}}"><font color="black">{{$task->name}}</font></a></td>
                                    <td>{{$task->priority->priority_text}} {!!$task->priority->priority_icon_html!!}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->due}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
        
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> Reset Password </a></div>
                </div>
            </div>
        </div>
        
        
        
        
    </div>
</div>
@endsection
