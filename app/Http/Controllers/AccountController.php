<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account() {

        return view('account');
    }

        public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        
    }
}
