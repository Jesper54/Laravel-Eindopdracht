<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Thread;
use Auth;
use Redirect;

class EditController extends Controller
{
    public function show(Topic $topic_id)
    {
        if(Auth::check())
        {
            if(Auth::id() == $topic_id->user_id)
            {
            $threads = Thread::select('title', 'id')->get();
            return view('/editTopic', compact('topic_id', 'threads'));
            }
            else
            {
                return Redirect::route('threads');
            } 
        }
        else {
            return Redirect::route('login');   
        }
    }
    public function store(Request $request, Topic $topic)
    {

        if ($request->category == "0") {
            return;
        }
        else {
            Topic::where('id', $topic->id)->update([
                'title' => $request->title,
                'thread_id' => $request->category,
                'user_id' => Auth::id(),
                'body' => $request->body
            ]);
            return redirect()->to('/topicView'.'/'.$topic->id);
        }
    }
}
