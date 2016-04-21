<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Color;
use App\Discussions;
use App\Priority;
use App\User;
use App\Status;
use Auth;
use Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTasks(){
        if(Auth::check()){
            return view('tasks', [
                'tasks' => Task::orderBy('created_at','asc')->get()
            ]);
        }
        else{
            return redirect('/login');
        }
    }

    public function getTask($id){
        if(Auth::check()){
            $task = Task::findorfail($id);
            $discussions = Discussions::getDiscussionsForPost($id);
            $data = array(
                'task' => $task,
                'discussions' => $discussions,
            );
            return view('taskview', $data);
        }
        else{
            return redirect('/')->withErrors('You must be logged in to view that task.');
        }
    }

    public function createTask(Request $request){
        if(Auth::check()){
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
        }
        else{
            return redirect('/')->withErrors('You must be authenticated to create tasks.');
        }
    }

    public function createTaskForm(){
        if(Auth::check()){
            return view('newtask', [
                'users' => User::orderBy('id', 'desc')->get(),
                'priorities' => Priority::orderBy('id', 'asc')->get(),
                'colors' => Color::orderBy('id', 'asc')->get()
            ]);
        }
        else{
            return redirect('/')->withErrors('You must be authenticated to create tasks.');
        }
    }

    public function editTask($id){
        if(Auth::check()){
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
        }
        else{
            return redirect('/')->withErrors('You must be authenticated to edit a task.');
        }
    }

    public function updateTask(Request $request, $id){
        if(Auth::check()){
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
        }
        else{
            return redirect('/')->withErrors('You must be authenticated to edit a task.');
        }
    }

    public function deleteTask($id){
        if(Auth::check()){
            Task::findOrFail($id)->delete();
            return redirect('/');
        }
        else{
            return redirect("/")->withErrors('You must be authenticated to delete a task.');
        }
    }
}
