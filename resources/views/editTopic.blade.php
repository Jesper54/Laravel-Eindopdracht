@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Edit Topic</h1>
                </div>
            </div>

          <form method="post" action="{{ route('SubmitEdit', ['topic' => $topic_id->id]) }}">

              {{ csrf_field() }}

                <div class="form-group">
                  <label for="title">Title</label>
                <input required type="title" value="{{$topic_id->title}}" class="form-control" name="title" id="title" placeholder="Title of the topic">
                </div>

                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" name="category" id="category">
                  <option value="{{$topic_id->thread_id}}" selected>Keep Same Category</option>
                    @foreach ($threads as $item) 
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                <label for="text">Text</label>
                  <textarea required class="form-control" id="text" name="body" rows="16" placeholder="The main text">{{$topic_id->body}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
              </form>

@endsection
