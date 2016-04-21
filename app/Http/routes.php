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
    Route::get('/', 'TaskController@getTasks');

    Route::get('/home', 'HomeController@index');

	Route::post('/task', 'TaskController@createTask');

	Route::delete('/task/{id}', 'TaskController@deleteTask');

    Route::get('/task/{id}', 'TaskController@getTask');

    Route::get('/task/{id}/edit', 'TaskController@editTask');
    
    Route::post('/task/{id}/edit', 'TaskController@updateTask');
    
    Route::delete('/task/{task_id}/deletechat/{discussion_id}', 'DiscussionController@deleteChatMessage');
    
    Route::post('/task/{id}/postchat', 'DiscussionController@addChatMessage');

    Route::get('/newtask', 'TaskController@createTaskForm');
});
