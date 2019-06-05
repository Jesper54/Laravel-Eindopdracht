@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Categories</h1>
                </div>
            </div>

            @auth
            <button onclick="location.href='{{ url('add-topic') }}'">Make a topic</button>
            @endauth


        <!-- Categorieën -->
        <div class="row">


        <!-- For each met alle topics die er al zijn vanuit de database -->
          @foreach ($topics as $topic)
          <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                  <h5 class="card-title">{{$topic->title}}</h5>
                  <p class="card-text">{{$topic->body}}</p>
                    <a href="#" class="btn btn-primary">Click here</a>
                  </div>
                </div>
              </div>
          @endforeach
        </div>

@endsection
