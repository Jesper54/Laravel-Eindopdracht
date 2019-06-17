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

        // $topic = new Topic;
        // $topic->title = $request('title');
        // $topic->thread_id = $request('category');
        // $topic->user_id = Auth::id();
        // $topic->body = $request('text');

        // $topic->save;


        // $title = $request->input('title');
        // $thread_id = $request->input('category');
        // $user_id = Auth::id();
        // $body = $request->input('text');
        // $data=array('title'=>$title,"thread_id"=>$thread_id,"user_id"=>$user_id,"body"=>$body);
        // DB::table('topics')->insert($data);


        return redirect()->route('threads');
    }

}
