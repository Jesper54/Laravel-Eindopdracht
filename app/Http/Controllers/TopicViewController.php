<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Replies;
use Auth;

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
}
