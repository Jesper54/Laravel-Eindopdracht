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

            <hr>

            <div class="content">
                    <div class="title m-b-md">
                        <h3>Settings</h3>
                    </div>
                </div>
                

            <div class="settings" id="settings">
                        <div class="form-group">
                            <label for="username">Change username</label>
                            <div class="input-group">

                                <form method="POST" action="ChangeUsername">
                                        {{ csrf_field() }}
                                    <input type="title" class="form-control" name="username" id="username" placeholder="Enter new username">
                                    <span class="input-group-btn" style="width: 40%;">
                                <button type="submit" class="btn btn-primary">Apply</button>
                            </form>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                        <label for="username">Change Password</label>
                        <div class="input-group">

                            <form method="POST" action="ChangePassword">
                                    {{ csrf_field() }}
                                <input type="title" class="form-control" name="password" id="password" placeholder="Enter old password">
                                <span class="input-group-btn" style="width: 40%;">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </form>
                    </span>
                </div>
            </div>
            

@endsection
