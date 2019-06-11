<?php

namespace App\Http\Controllers;

use App\Thread;
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
}
