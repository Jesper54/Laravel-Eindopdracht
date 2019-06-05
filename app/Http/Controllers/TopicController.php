<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Thread;

class TopicController extends Controller
{
        public function topic(Thread $thread)
    {
        $topics = Topic::where('id',$thread->id)->get();
        return view('topic', compact('topics'));
    }
}