<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Auth;
use Redirect;

class createCategoryController extends Controller
{
    public function show()
    // In deze controller kan je een categorie aanmaken
    { // Hier checkt hij of je bent ingelogd
        if(Auth::check())
        {
            // Hierbij checkt hij of je de rechten ervoor hebt
            if(Auth::user()->role == "1")
            {
                return view('/createCategory');
            }
            else
            { // Zo niet? Dan ga je terug naar de threads pagina
                return Redirect::route('threads');
            } 
        }
        else { // Zo niet? dan ga je terug naar de inlog pagina
            return Redirect::route('login');   
        }
    }

    public function store(Request $request)
    {
        // Hier maak je de thread en post je hem in de database
        Thread::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'body' => $request->text  
        ]);
        
        return redirect()->route('threads');
    }
}
