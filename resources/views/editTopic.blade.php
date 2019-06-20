@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Edit Topic</h1>
                </div>
            </div>

          <form method="post" action="SubmitEdit">

              {{ csrf_field() }}

                <div class="form-group">
                  <label for="title">Title</label>
                  <input required type="title" class="form-control" name="title" id="title" placeholder="Title of the topic">
                </div>

                <div class="form-group">
                  <label for="text">Text</label>
                  <textarea required class="form-control" id="text" name="text" rows="8" placeholder="The main text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <button class="btn btn-warning">Cancel</button>
              </form>

@endsection
