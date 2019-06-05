<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Topic;

class ThreadController extends Controller
{
    public function threads()
    {
        $threads = Thread::all();
        $topics = Topic::all();

        return view('threads', compact('threads'));
    }

    public function show(Thread $thread)
    {
        $topics = Topic::where('thread_id', $thread->id)->get();
        return view('topic', compact('thread', 'topics'));
    }
}
