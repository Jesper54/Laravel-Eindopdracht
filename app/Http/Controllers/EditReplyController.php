<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Replies;
use App\Topic;
use Auth;
use Redirect;

class EditReplyController extends Controller
{
    public function show(Replies $reply_id)
    {
        if(Auth::check())
        {
            if(Auth::id() == $reply_id->user_id)
            {
            return view('/editReply', compact('reply_id'));
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

    public function store(Request $request, Replies $reply)
    {

        if ($request->category == "0") {
            return;
        }
        else {
            Replies::where('id', $reply->id)->update([
                'user_id' => Auth::id(),
                'body' => $request->body
            ]);
            return redirect()->to('/topicView'.'/'.$reply->topic_id);
        }
    }
}
