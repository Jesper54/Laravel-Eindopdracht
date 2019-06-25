<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Replies;
use App\Topic;
use Auth;
use Hash;
use Image;
use Redirect;
use File;
use Route;

class AccountController extends Controller
{
    public function account() {
        // Hier selecteerd hij de topics van die van het account zijn
        $topics = Topic::where('user_id',Auth::id())->orderBy('created_at', 'desc')->paginate(3);
        return view('account', compact('topics'));
    }

        public function __construct()
    {
        $this->middleware('auth');
    }
    // De functie om je naam te wijzigen
    public function storeUsername(Request $request)
    {
        if(strlen($request->username)<5){
            return redirect()->back()->with('name', 'Username length is too short!');  
        }
        else {
            $username = User::find(Auth::id());
            $username->name = $request->username;
            $username->save();

            return redirect()->back();   
        }
    }
    // De functie om je email te wijzigen
    public function storeEmail(Request $request)
    {

        if (User::where('email', '=', $request->email)->exists()) {
            return redirect()->back()->with('email', 'Email is already taken');  
        }
        else {
            $username = User::find(Auth::id());
            $username->email = $request->email;
            $username->save();
    
            return redirect()->back();   
        }
    }
    // De functie om je wachtwoord te wijzigen
    public function storePassword(Request $request)
    {
        if (strlen($request->password)<8) {
            return redirect()->back()->with('password', 'Password length is too short');  
          }
          else {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect()->back();
          }
    }
    // De functie om een profielfoto aan te maken en te gebruiken
    // Hierbij heb ik een package gebruikt met de naam Intervention\image 
    // De oude profielfoto word automatisch verwijderd
    // En de nieuwe komt als string in de database en als bestand in de public/uploads/avatar/ map te staan
    public function storePicture(Request $request)
    {
        if($request->hasFile('avatar')){
            
             $extensions = ["jpg" , "jpeg", "png"];
             $avatar = $request->file('avatar');
             $isImage = $avatar->getClientOriginalExtension();

            if (in_array($isImage , $extensions)){  
            
                $old_file=Auth::user()->avatar; // Default.jpg moet niet verwijdert worden
            if('/uploads/avatars/'.$old_file == "/uploads/avatars/default.jpg"){
                
            }
            else { // Hier verwijdert het systeem het oude bestand
                \File::delete(public_path('/uploads/avatars/'.$old_file));
            }
            // upload het nieuwe bestand geeft het een random naam en resized het bestand naar 300x300 pixels
             $filename = time() . '.' . $avatar->getClientOriginalExtension();
    		 Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		 $user = Auth::user();
             $user->avatar = $filename;
             $user->save();
            
            return redirect()->back();   
            }
            else { // Als het bestand een verkeerde extensie heeft stuurt hij een foutmelding terug
                return Redirect::back()->withErrors(['This filetype is not supported!', 'The Message']);
            }
        }
    }
}
