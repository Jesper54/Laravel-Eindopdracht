<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Thread;

class TopicController extends Controller
{
    public function topic()
    {
        $topics = Topic::all();
        dd($topics);
        return view('topic', ['topics' => $topics]);
    }
}
