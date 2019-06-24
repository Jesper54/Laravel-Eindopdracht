@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Topics</h1>
                </div>
            </div>

        <!-- Topics -->

        <!-- Een overzicht van alle topics die bij de geselecteerde categorie horen -->

        <!-- For each met alle topics die er al zijn vanuit de database -->
          @foreach ($topics as $topic)
          <div class="card w-75">
            <div class="card-body">
            <h5 class="card-title">{{$topic->title}}<span style="float:right; font-size:13px;">Author: {{$topic->user->name}}</span><br> <span style="float:right; font-size:13px;">Date: {{$topic->created_at}}</span></h5>
              <p class="card-text">{{ substr($topic->body, 0,  75) }} ...</p>
              <a href="{{ route('topic', ['id' => $topic->id]) }}" class="btn btn-primary">Click here</a>
            </div>
          </div>
          <br>
          @endforeach

          <br>
          {{ $topics->links() }}

@endsection
