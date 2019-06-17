<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $topic = new Topic;
        $topic->title = request('title');
        $topic->thread_id = request('category');
        $topic->user_id = request(Auth::user()->id);
        $topic->body = request('text');

        $topic->save;

        return redirect()->route('threads');
    }

}
