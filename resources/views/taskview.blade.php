<!DOCTYPE html>
<html style="height: 100%;">
    <head>
        <title>{{$task->name}}</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('resources/css/taskview.css')}}" rel="stylesheet" text="text/css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <nav>
        <div class="container-fluid">
            <div class="col-lg-12 sample-nav-bar">
                Some nav bar?
            </div>
        </div>
    </nav>
    <body style="height: 100%;">
        <div class="container-fluid fullscreen">
            <div class="col-lg-3">
                Task ID: {{$task->id}} <br />
                Task: {{$task->name}} <br />
                Created at: {{$task->created_at}} <br />
                Description: {{$task->description}} <br />
                Assignee: {{$task->assignee_id}} <br />
                Priority: {{$task->priority_id}} <br />
                Due date: {{$task->due}} <br />
                Category: {{$task->category_id}} <br />
                Color: {{$task->color_id}} <br />
                Discussion: {{$task->discussion_id}} <br />
            </div>
            <div class="col-lg-6 fullscreen-y discussion-outline">
                <div class="discussion">
                </div>
                <form action="" method="GET">
                    <textarea class="fullscreen-x"></textarea>
                    <button class="pull-right" type="submit" value="Submit">Submit</button>
                </form>
            </div>
            <div class="col-lg-3">
                See some task history here
            </div>
        </div>
    </body>
</html>

