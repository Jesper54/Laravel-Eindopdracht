<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class createTopicController extends Controller
{
    public function show()
    {
        // Hier selecteerd hij alles van de topics
        $threads = $this->categories();
        return view('createTopic', compact('threads'));
    }

    public function categories()
    {   // Dit is voor de dropdown om uit een onderwerp te kiezen voor de topic
        return Thread::select('title', 'id')->get();
    }

    
    public function store(Request $request)
    {
        // Hier maak je de topic aan, iedere topic heeft een uniek ID dus er komt nooit een probleem met het inladen
        Topic::create([
            'title' => $request->title,
            'thread_id' => $request->category,
            'user_id' => Auth::id(),
            'body' => $request->text
        ]);

        return redirect()->route('threads');
    }

}
