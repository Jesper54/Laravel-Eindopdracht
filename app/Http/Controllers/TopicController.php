<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
    public function topic()
    {
        $topics = Topic::all();
        return view('topic', compact('topic'));
    }
}
