@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                <div class="panel-body">
                    <!-- New Task Form -->
                    <form action="/task" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-description" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="description" id="task-description" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-priority" class="col-sm-3 control-label">Priority</label>
                            <div class="col-sm-6">
                                <select name="priority" class="form-control">
                                    @foreach($priorities as $priority)
                                        <option value="{{$priority->id}}">{{$priority->priority_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-date" class="col-sm-3 control-label">Due Date</label>
                            <div class="col-sm-6">
                                <input type="date" name="duedate" id="task-date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-color" class="col-sm-3 control-label">Select Color</label>
                            <div class="col-sm-6">
                                <select name="color" class="form-control">
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->color_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-assignee" class="col-sm-3 control-label">Select Assignee</label>
                            <div class="col-sm-6">
                                <select name="assignee" class="form-control">
                                    <option value="0">Not Assigned</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}}">{{$user->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection