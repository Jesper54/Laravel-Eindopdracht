<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class createTopicController extends Controller
{
    public function show()
    {
        return view('create_topic');
    }

    public function categories()
    {
        $threads = DB::table('threads')->pluck('title');
    }
}
