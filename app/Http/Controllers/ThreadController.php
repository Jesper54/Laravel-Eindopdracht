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

        public function show(Thread $thread)
    {
        $topics = $thread->topics()->paginate(6);
        
        return view('topic', compact('topics'));
    }
}
