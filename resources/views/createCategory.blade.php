@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Create Category</h1>
                </div>
            </div>

          <form method="post" action="createCategorySubmit">

              {{ csrf_field() }}

                <div class="form-group">
                  <label for="title">Title</label>
                  <input required type="title" class="form-control" name="title" id="title" placeholder="Title of the category">
                </div>

                <div class="form-group">
                  <label for="text">Text</label>
                  <textarea required class="form-control" id="text" name="text" rows="4" maxlength="100" placeholder="The description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <button class="btn btn-warning">Cancel</button>
              </form>

@endsection
