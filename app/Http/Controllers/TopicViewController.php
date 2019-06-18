<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicViewController extends Controller
{
    public function topicview(Topic $topic)
    {
        $topics = Topic::where('id',$topic->id)->get();
        return view('topic', compact('topics'));
    }

    public function show(Topic $topic)
    {
        $topic = $topics->topics();

        return view('topics', compact('topic'));

    }
}
