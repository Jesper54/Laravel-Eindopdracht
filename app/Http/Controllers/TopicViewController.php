<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Replies;
use Auth;
use Redirect;

class TopicViewController extends Controller
{
    public function topicview(Topic $topic)
    {
        $topics = Topic::where('id',$topic->id)->get();
        return view('topic', compact('topics'));
    }

    public function show(Topic $topic)
    {
        $replies = Replies::where('topic_id',$topic->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('TopicView', compact('topic', 'replies'));
    }

    public function store(Request $request, Topic $topic)
    {
        Replies::create([
            'user_id' => Auth::id(),
            'body' => $request->reactionText,
            'topic_id' =>$topic->id
        ]);

        return redirect()->back();
    }

    public function deleteTopic(Topic $topic)
    {
        if(Auth::check())
        {
            if(Auth::id() == $topic->user_id)
            {
                Replies::where('topic_id', $topic->id)->delete();
                Topic::where('id', $topic->id)->delete();

                return Redirect::route('threads');
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

    public function deleteReply(Replies $reply)
    {
        if(Auth::check())
        {
            if(Auth::id() == $reply->user_id)
            {
                Replies::where('id', $reply->id)->delete();

                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            } 
        }
        else {
            return Redirect::route('login');   
        }
    }
}
