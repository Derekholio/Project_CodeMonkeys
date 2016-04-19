<?php

use App\Task;
use App\Discussions;
use App\Priority;
use App\User;
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
		return view('tasks', [
            'tasks' => Task::orderBy('created_at','asc')->get(),
            'users' => User::orderBy('id', 'desc')->get(),
            'priorities' => Priority::orderBy('id', 'asc')->get()
	    ]);
	});

	Route::post('/task',function (Request $request){

	$validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'priority' => 'required',
            'description' => 'required',
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
		$task->save();
		return redirect('/');
	});

	Route::delete('/task/{id}',function ($id) {
	Task::findOrFail($id)->delete();

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
});
