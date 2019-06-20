<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function show(Request $request)
    {
        return view('/editTopic');
    }
}
