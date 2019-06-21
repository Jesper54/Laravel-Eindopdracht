@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Edit Reaction</h1>
                </div>
            </div>

          <form method="post" action="{{ route('SubmitReply', ['reply' => $reply_id->id]) }}">

              {{ csrf_field() }}

                <div class="form-group">
                <label for="text">Reaction</label>
                  <textarea required class="form-control" id="text" name="body" rows="5" placeholder="The main text">{{$reply_id->body}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
              </form>

@endsection
