@extends('layouts.app')

@section('content')
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('resources/css/taskview.css')}}" rel="stylesheet" text="text/css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
                    <span><strong>Derek</strong>: Example initial discussion post</span>
                    <hr>
                    <span><strong>James</strong>: This is a really long discussion post!! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                    <hr>
                    <span><strong>Jared</strong>: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu vulputate erat, consequat faucibus nulla. Cras fringilla tincidunt nunc nec porta. Curabitur nisi urna, sagittis ac convallis eu, ornare et orci. Mauris feugiat quis nulla ut eleifend. Nullam nec nibh consequat, mollis dolor nec, dictum massa. Ut eget elit quis turpis imperdiet bibendum dapibus sit amet dui. Sed elit ante, placerat eu consequat sit amet, maximus quis enim. Cras iaculis volutpat ipsum, vel pharetra nunc rhoncus quis.</span>
                    <hr>
                    <span><strong>Kyle</strong>: Nam pellentesque, massa eget iaculis porttitor, nibh lacus vehicula leo, ut lacinia turpis urna sit amet massa. Aenean ultrices egestas vestibulum. Duis blandit erat et massa faucibus, suscipit porta justo mattis. Vivamus lacinia scelerisque nibh, ac aliquet nisi semper eu. Nam lorem augue, laoreet at felis sed, elementum iaculis urna. Ut molestie tellus eget ex viverra, in volutpat tortor facilisis. Suspendisse ut arcu cursus, porta enim ut, consequat leo. Integer posuere gravida nisi, eu finibus tortor euismod cursus. Phasellus volutpat egestas arcu sed fermentum. Sed sapien leo, luctus mattis egestas ut, porta nec enim. Ut posuere massa nec libero tristique sollicitudin. Proin in ultricies mi. Pellentesque interdum scelerisque fringilla.</span>
                    <hr>
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
@endsection