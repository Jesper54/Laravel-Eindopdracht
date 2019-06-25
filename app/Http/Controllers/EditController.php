<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Thread;
use Auth;
use Redirect;

class EditController extends Controller
{
    public function show(Topic $topic_id)
    {
        // Hier checkt hij of je bent ingelogd
        if(Auth::check())
        {   // Als het jou eigen id gelijk is aan het user_id van de topic die je wilt editen
            // Dan krijg je de edit pagina te zien met alle informatie van de topic
            if(Auth::id() == $topic_id->user_id)
            {
            $threads = Thread::select('title', 'id')->get();
            return view('/editTopic', compact('topic_id', 'threads'));
            }
            else
            { // Zo niet return naar threads pagina
                return Redirect::route('threads');
            } 
        }
        else { // Zo niet return naar de login pagina
            return Redirect::route('login');   
        }
    }
    public function store(Request $request, Topic $topic)
    {
            // Als je geen categorie hebt geselecteerd, dus de iets met de value 0 
            // Dan doet hij niets
        if ($request->category == "0") {
            return;
        }
        else {
            // Anders update hij de topic in de database
            Topic::where('id', $topic->id)->update([
                'title' => $request->title,
                'thread_id' => $request->category,
                'user_id' => Auth::id(),
                'body' => $request->body
            ]);
            return redirect()->to('/topicView'.'/'.$topic->id);
        }
    }
}
