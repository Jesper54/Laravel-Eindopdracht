<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Topic;
use Str;

class ThreadController extends Controller
{
    public function threads()
    {
        $threads = Thread::paginate(6);

        return view('threads', compact('threads'));
    }

        public function show(Thread $thread)
    {
        $topics = $thread->topics()->orderBy('created_at', 'desc')->paginate(6);

        return view('topic', compact('topics'));
    }
}
