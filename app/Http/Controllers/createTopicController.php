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
        $threads = $this->categories();
        return view('createTopic', compact('threads'));
    }

    public function categories()
    {
        return Thread::select('title', 'id')->get();
    }

    
    public function store(Request $request)
    {

        Topic::create([
            'title' => $request->title,
            'thread_id' => $request->category,
            'user_id' => Auth::id(),
            'body' => $request->text
        ]);

        return redirect()->route('threads');
    }

}
