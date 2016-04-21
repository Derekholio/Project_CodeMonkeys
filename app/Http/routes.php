<?php

use App\Task;
use App\Discussions;
use App\Priority;
use App\User;
use App\Color;
use App\Status;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
	Route::get('/', function () {
        if(Auth::check()){
            return view('tasks', [
                'tasks' => Task::orderBy('created_at','asc')->get()
            ]);
        }
        else{
            return redirect('/login');
        }

	});

	Route::post('/task',function (Request $request){

	$validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'priority' => 'required',
            'description' => 'required|max:255',
            'duedate' => 'required'
		]);


		if ($validator->fails()) {
			return redirect('/')
				->withInput()
				->withErrors($validator);
		}

		$task = new Task;
		$task->name = $request->name;
        $task->description = $request->description;
        $task->priority_id = $request->priority;
		$task->due = $request->duedate;
        $task->color_id = $request->color;
        $task->assignee_id = $request->assignee;
        $task->status_id = 0;//New task
		$task->save();
		return redirect('/');
	});

	Route::delete('/task/{id}',function ($id) {

        if(!Auth::check()){
            return redirect("/")->withErrors(['You need to be authenticated to delete a task.']);

        }else {
            Task::findOrFail($id)->delete();
        }
	return redirect('/');
	});
        
        Route::get('/task/{id}', function($id){
            $task = Task::findorfail($id);
            $discussions = Discussions::getDiscussionsForPost($id);
            $data = array(
                'task' => $task,
                'discussions' => $discussions,
            );
            return view('taskview', $data);
        });

        Route::get('/task/{id}/edit', function($id){
            $task = Task::findorfail($id);
            $discussions = Discussions::getDiscussionsForPost($id);
            $users = User::orderBy('id', 'desc')->get();
            $priorities = Priority::orderBy('id', 'asc')->get();
            $colors = Color::orderBy('id', 'asc')->get();
            $status = Status::orderBy('id', 'asc')->get();

            $data = array(
                'task' => $task,
                'discussions' => $discussions,
                'users' => $users,
                'priorities' => $priorities,
                'colors' => $colors,
                'status' => $status
            );

            return view('taskedit', $data);
        });

        Route::post('/task/{id}/edit', function(Request $request, $id){
            $task = Task::findorfail($id);
            $task->name = $request->name;
            $task->description = $request->description;
            $task->assignee_id = $request->assignee;
            $task->priority_id = $request->priority;
            $task->due = $request->duedate;
            $task->color_id = $request->color;
            $task->status_id = $request->status;

            $task->save();

            return redirect("/task/$id");
        });
    
        Route::delete('/task/{task_id}/deletechat/{discussion_id}', function($task_id, $discussion_id){
            Discussions::deleteDiscussion($discussion_id);
            return redirect("/task/$task_id/edit");
        });
        
        Route::post('/task/{id}/postchat',function (Request $request, $id){
            
            if(!Auth::check()){
                return redirect("/task/$id")->withErrors(['You need to be authenticated to post here.']);
                
            }

            $validator = Validator::make($request->all(),[
                'discussion' => 'required|min:1',
            ]);
            
            if ($validator->fails()) {
                    return redirect("/task/$id")
                            ->withInput()
                            ->withErrors($validator);
            }
            
            $discussion = new Discussions;
            $discussion->message = $request->discussion;
            $discussion->posted_time = Carbon\Carbon::now();
            $discussion->task_id = $id;
            $discussion->user_id = Auth::id();
            $discussion->save();

            return redirect("/task/$id");
	});
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/newtask', function() {
        if(Auth::check()){
            return view('newtask', [
                'users' => User::orderBy('id', 'desc')->get(),
                'priorities' => Priority::orderBy('id', 'asc')->get(),
                'colors' => Color::orderBy('id', 'asc')->get()
            ]);
        }
        else{
            return redirect('/')->withErrors('You must be logged in to view that.');
        }
    });
});
