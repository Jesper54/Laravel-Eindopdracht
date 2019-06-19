@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Create Topic</h1>
                </div>
            </div>

          <form method="post" action="createTopic">

              {{ csrf_field() }}

                <div class="form-group">
                  <label for="title">Title</label>
                  <input required type="title" class="form-control" name="title" id="title" placeholder="Title of the topic">
                </div>

                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" name="category" id="category">
                    <option value="0" disabled selected>Selecteer een onderwerp</option>
                    @foreach ($threads as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                  </select>
                </div>

                {{-- <div class="form-group">
                    <label for="description">Description</label>
                    <small style="color:red">(Max 120 characters)</small>
                    <textarea class="form-control" id="description" rows="2" maxlength="120" placeholder="Description text"></textarea>
                </div> --}}

                <div class="form-group">
                  <label for="text">Text</label>
                  <textarea required class="form-control" id="text" name="text" rows="8" placeholder="The main text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <button class="btn btn-warning">Cancel</button>
              </form>

@endsection
