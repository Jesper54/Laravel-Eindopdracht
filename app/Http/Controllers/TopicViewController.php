<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Replies;
use Auth;
use Redirect;

class TopicViewController extends Controller
{
    public function topicview(Topic $topic)
    {   // Hier laad hij de topic uit de database 
        // waar de link id hetzelfde was
        $topics = Topic::where('id',$topic->id)->get();
        return view('topic', compact('topics'));
    }

    public function show(Topic $topic)
    {   //  Hier laat hij alle topics zien die hetzelfde topic_id mee hebben
        $replies = Replies::where('topic_id',$topic->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('TopicView', compact('topic', 'replies'));
    }

    public function store(Request $request, Topic $topic)
    {   // Hier maakt hij de reactie aan en slaat hem op in de database
        Replies::create([
            'user_id' => Auth::id(),
            'body' => $request->reactionText,
            'topic_id' =>$topic->id
        ]);

        return redirect()->back();
    }

    public function deleteTopic(Topic $topic)
    {   // Hier checkt hij of je bent ingelogd om een topic te verwijderen
        if(Auth::check())
        {   // Checkt of je id hetzelfde is als het user_id van de topic
            if(Auth::id() == $topic->user_id || Auth::user()->role == "1")
            {   // Dan verwijdert hij de topic met alle bijbehorende reacties
                Replies::where('topic_id', $topic->id)->delete();
                Topic::where('id', $topic->id)->delete();

                return Redirect::route('threads');
            }
            else
            { // Zo niet return naar threads pagina
                return Redirect::route('threads');
            } 
        }
        else { // Zo niet return naar login pagina
            return Redirect::route('login');   
        }
    }

    public function deleteReply(Replies $reply)
    {   // Checkt of je bent ingelogd
        if(Auth::check())
        {   // Checkt of je role overeenkomt met het user_id van de reply
            // Als je admin bent is je role 1 anders 0
            if(Auth::user()->role == "1")
            {   // Verwijderd de topic als admin
                Replies::where('id', $reply->id)->update([
                    'body' => "[Deleted by Admin]",
                ]);

                return redirect()->back();
            }
                // Als normale user verwijder je de gehele reactie
            if(Auth::id() == $reply->user_id)
            {   // Verwijderd de reactie
                Replies::where('id', $reply->id)->delete();

                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            } 
        }
        else { // Return naar login als je niet bent ingelogd
            return Redirect::route('login');   
        }
    }
}
