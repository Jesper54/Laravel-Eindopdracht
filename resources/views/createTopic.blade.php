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
                    <option value="0" disabled selected>Selecteer een onderwerp</option>
                    @foreach ($threads as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <small style="color:red">(Max 120 characters)</small>
                    <textarea class="form-control" id="description" rows="2" maxlength="120" placeholder="Description text"></textarea>
                </div>

                <div class="form-group">
                  <label for="text">Text</label>
                  <textarea class="form-control" id="text" rows="8" placeholder="The main text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <button class="btn btn-warning">Cancel</button>
              </form>

@endsection
