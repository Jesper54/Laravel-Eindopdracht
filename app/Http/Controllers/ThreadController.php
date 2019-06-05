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
        return view('threads', compact('threads'));
    }

    public function show(Thread $thread, Topic $topic)
    {
        return view('topic', compact('thread', 'topic'));
    }
}
