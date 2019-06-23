<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Auth;
use Redirect;

class createCategoryController extends Controller
{
    public function show()
    {
        if(Auth::check())
        {
            if(Auth::user()->role == "1")
            {
                return view('/createCategory');
            }
            else
            {
                return Redirect::route('threads');
            } 
        }
        else {
            return Redirect::route('login');   
        }
    }

    public function store(Request $request)
    {
        Thread::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'body' => $request->text  
        ]);

        return redirect()->route('threads');
    }
}
