@extends('layouts.app')

@section('content')
<div class="container">

        <div class="content">
                <div class="title m-b-md">
                    <h1>Categories</h1>
                </div>
            </div>

            <button onclick="location.href='{{ url('add-topic') }}'">Make a topic</button>

        <!-- Categorieën -->
        <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
          </div>


          <!-- For each met alle topics die er al zijn vanuit de database -->


@endsection
