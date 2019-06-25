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
        // Hier checkt hij of je bent ingelogd
        if(Auth::check())
        { // Hier vergelijkt hij het id van de ingelogde user met het user_id van de reply
            if(Auth::id() == $reply_id->user_id)
            {
            return view('/editReply', compact('reply_id'));
            }
            else
            { // Zo niet? return naar threads
                return Redirect::route('threads');
            } 
        }
        else { // Zo niet? return naar login
            return Redirect::route('login');   
        }
    }

    public function store(Request $request, Replies $reply)
    {
        if ($request->category == "0") {
            return;
        }
        else { // Update de reactie in de database
            Replies::where('id', $reply->id)->update([
                'user_id' => Auth::id(),
                'body' => $request->body
            ]);
            return redirect()->to('/topicView'.'/'.$reply->topic_id);
        }
    }
}
