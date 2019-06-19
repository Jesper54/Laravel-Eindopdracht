<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Replies;
use App\Topic;
use Auth;
use Hash;

class AccountController extends Controller
{
    public function account() {

        $topics = Topic::where('user_id',Auth::id())->orderBy('created_at', 'desc')->paginate(3);
        return view('account', compact('topics'));
    }

        public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function storeUsername(Request $request)
    {
        $username = User::find(Auth::id());
        $username->name = $request->username;
        $username->save();

        return redirect()->back();
    }

    public function storeEmail(Request $request)
    {
        $username = User::find(Auth::id());
        $username->email = $request->email;
        $username->save();

        return redirect()->back();
    }

    public function storePassword(Request $request)
    {

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back();
    }

    public function storePicture(Request $request)
    {
        
    }
}
