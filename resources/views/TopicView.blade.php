@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card w-75">
                <div class="card-body">
                    <h1 class="card-title">{{$topic->title}}<span style="float:right; font-size:13px;">User: {{$topic->user->name}}<br>Date: {{$topic->created_at}}</span></h1>
                    <p class="card-text">{{ $topic->body }}</p>
                </div>
              </div>


@endsection
