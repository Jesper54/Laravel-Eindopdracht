@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Topics</h1>
                </div>
            </div>

            @auth
            <button onclick="#">Make a topic</button>
            @endauth


        <!-- Topics -->
        

        <!-- For each met alle topics die er al zijn vanuit de database -->
          @foreach ($topics as $topic)
          <div class="card w-75">
            <div class="card-body">
              <h5 class="card-title">{{$topic->title}}</h5>
              <p class="card-text">{{$topic->body}}</p>
              <a href="#" class="btn btn-primary">Click here</a>
            </div>
          </div>
          <br>
          @endforeach
          
          <br>
          <a href="{{ $topic->links }}">Next page</a>

@endsection
