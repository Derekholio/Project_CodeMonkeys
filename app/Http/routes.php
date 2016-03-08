<?php

use App\Task;
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
		'tasks' => Task::orderBy('created_at','asc')->get()
	]);
	});

	Route::post('/task',function (Request $request){

	$validator = Validator::make($request->all(),[
	'name' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return redirect('/')
				->withInput()
				->withErrors($validator);
		}
		$task = new Task;
		$task->name = $request->name;
		$task->save();
		return redirect('/');
	});

	Route::delete('/task/{id}',function ($id) {
	Task::findOrFail($id)->delete();

	return redirect('/');
	});
        
        Route::get('/task/{id}', function($id){
            $task = Task::findorfail($id);
            $data = array(
                'task' => $task,
            );
            return view('taskview', $data);
        });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
