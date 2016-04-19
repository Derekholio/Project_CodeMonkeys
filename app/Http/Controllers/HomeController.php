<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Task;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::where('assignee_id', $request->user()->id)->orderBy('id', 'asc')->get();
        return view('home', [
            'tasks' => $tasks
        ]);
    }
}
