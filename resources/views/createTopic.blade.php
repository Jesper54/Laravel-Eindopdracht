@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Create Topic</h1>
                </div>
            </div>

            <form>
                <div class="form-group">
                  <label for="username">Title</label>
                  <input type="title" class="form-control" id="username" placeholder="Title of the topic">
                </div>
                <div class="form-group">
                  <label for="category">Category</label>

                  <select class="form-control" id="exampleFormControlSelect1">
                    <option value="0">Selecteer een onderwerp</option>
                    @foreach ($threads as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Example textarea</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>

@endsection
