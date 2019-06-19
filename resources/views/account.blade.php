@extends('layouts.app')

@section('content')
<div class="container">

            <div class="container-fluid">
                    <div class="content">
                            <div class="title m-b-md">
                                <h1>Account</h1>
                                <hr>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4" style="padding-bottom:100px;">
                                <div class="card" style="width: 18rem;">
                                        {{-- Nog upload maken voor profiel foto --}}
                                        <img class="card-img-top" style="height:250px; width:auto;" src="https://media1.giphy.com/media/jVAt83ieT49H6ja5Ty/giphy.webp" alt="Card image cap">
                                        <div class="card-body">
                                        <h4 class="card-title">         {{ Auth::user()->name }}</h4>
                                        <p class="card-text">Email:     {{ Auth::user()->email }}</p>
                                        <p class="card-text">Joined at: {{ Auth::user()->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-8">
                                    <h5>Your topics</h5>
                                    @foreach ($topics as $item)
                                        <div class="card w-75">
                                                <div class="card-body">
                                                <h5 class="card-title"><a href="{{ route('topic', ['id' => $item->id]) }}">{{$item->title}}</a><span style="float:right; font-size:13px;">Author: {{$item->user->name}}</span><br> <span style="float:right; font-size:13px;">Date: {{$item->created_at}}</span></h5>
                                                <p class="card-text">{{ substr($item->body, 0,  75) }} ...</p>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                    {{ $topics->links() }}
                                </div>
                            </div>
                        </div>
                        
            <br><br><br>
            <hr>

            <div class="content">
                    <div class="title m-b-md">
                        <h3>Settings</h3>
                    </div>
                </div>
                

            <div class="settings" id="settings">

            <form method="POST" action="ChangeUsername">
                {{ csrf_field() }}
                    <label for="username">Change username</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter new username" required>
                            <span class="input-group-btn" style="width: 40%;">
                            <button type="submit" class="btn btn-primary">Apply</button>
                            </span>
                        </div>
                    </form>
                    <br>

            <form method="POST" action="ChangeEmail">
                {{ csrf_field() }}
                    <label for="email">Change email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter new email" required>
                            <span class="input-group-btn" style="width: 40%;">
                            <button type="submit" class="btn btn-primary">Apply</button>
                            </span>
                        </div>
                    </form>
                    <br>

            <form method="POST" action="ChangePassword">
                {{ csrf_field() }}
                    <label for="password">Change password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                            <span class="input-group-btn" style="width: 40%;">
                            <button type="submit" class="btn btn-primary">Apply</button>
                            </span>
                        </div>
                    </form>
                    <br>
                    <hr>

            </div>
            <div style="padding-bottom:100px;"></div>
        </div>
        
            
@endsection
