@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Categories</h1>
                </div>
            </div>
        <!-- Categorieën -->
        <div class="row">


        <!-- For each met alle topics die er al zijn vanuit de database -->
          @foreach ($threads as $thread)
          <div class="col-sm-6">
                <div class="card" style="margin-bottom:30px;">
                  <div class="card-body">
                  <h5 class="card-title">{{$thread->title}}</h5>
                  <p class="card-text">{{$thread->body}}</p>
                  <a href="{{ route('threads.id', ['id' => $thread->id]) }}" class="btn btn-primary">Click here</a>
                  </div>
                </div>
              </div>
          @endforeach

          {{ $threads->links() }}

@endsection
