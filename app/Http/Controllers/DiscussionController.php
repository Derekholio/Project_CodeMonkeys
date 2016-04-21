<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Discussions;
use Auth;
use Validator;
use Carbon;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addChatMessage(Request $request, $id){
        if(Auth::check()){
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
        }
        else{
            return redirect('/')->withErrors('You must be authenticated to post a new comment to a task.');
        }
    }

    public function deleteChatMessage($task_id, $discussion_id){
        if(Auth::check()){
            Discussions::deleteDiscussion($discussion_id);
            return redirect("/task/$task_id/edit");
        }
        else{
            return redirect('/')->withErrors('You must be authenticated to delete a comment for a task.');
        }
    }
}
