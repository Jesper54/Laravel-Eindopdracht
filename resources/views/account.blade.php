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

            <br>
            <br>
            <br>

            <div class="content">
                    <div class="title m-b-md">
                        <h3>Settings</h3>
                    </div>
                </div>

            <div class="settings">
                <form>
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Change username</label>
                            <div class="input-group">
                                <input type="title" class="form-control" name="username" id="username" placeholder="Enter new username">
                            <span class="input-group-btn" style="width: 40%;">
                                <button type="submit" class="btn btn-primary">Apply</button>
                            </span>
                        </div>
                </form>
            </div>

            

@endsection
