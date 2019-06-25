<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Topic;
use Str;

class ThreadController extends Controller
{
    public function threads()
    {   // Hier haalt hij alle threads uit de pagina
        $threads = Thread::paginate(6);
        // Geeft hij ze door als variabele $threads om
        // Om in een foreach te zetten en in te laden
        return view('threads', compact('threads'));
    }

        public function show(Thread $thread)
    {   // Hier laat hij alle topics in die bij dat onderwerp horen
        $topics = $thread->topics()->orderBy('created_at', 'desc')->paginate(6);

        return view('topic', compact('topics'));
    }
}
