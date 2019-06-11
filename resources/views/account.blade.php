@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Account</h1>
                </div>
            </div>

        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://media.giphy.com/media/TGud9xA2rqmsVD3OZi/giphy.gif" alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">         {{ Auth::user()->name }}</h4>
                <p class="card-text">Email:     {{ Auth::user()->email }}</p>
                <p class="card-text">Joined at: {{ Auth::user()->created_at }}</p>
                </div>
              </div>

@endsection
