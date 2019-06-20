@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card w-75">
                <div class="card-body" style="height: auto; padding-bottom:50px;">
                    <h1 class="card-title">{{$topic->title}}<span style="float:right; font-size:13px;">User: {{$topic->user->name}}<br>
                                                                                                       Date: {{$topic->created_at}}<br>
                                                                                                       @if($topic->user_id == Auth::id())
                                                                                                    <button href="{{ route('') }}" style="margin-top:10px;" class="btn btn-sm btn-primary">Edit</button>
                                                                                                        <button href="" style="margin-top:10px;" class="btn btn-sm btn-danger">Delete</button>
                                                                                                       @endif
                                                                                                        
                                                                                                        </span></h1><br>
                    <hr>
                    {!! nl2br($topic->body) !!}
                </div>
              </div>
            </div>

            <div class="container" style="padding-top:50px;">
                    <div class="card w-75">
                            <div class="card-body" style="height: auto; padding-bottom:25px;">
                                <h2 class="card-title">Reactions<span style="float:right; font-size:13px;"></h2>

                                    {{-- Form voor reactie maken --}}
                                <form method="post" action="{{ route('comment', ['topic' => $topic->id]) }}">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea required style="margin-bottom:5px;" class="form-control" id="text" name="reactionText" rows="4" placeholder="Enter reaction..."></textarea>
                                        </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                       </div>
                   </div>

                   {{-- REACTIES --}}
                   @foreach ($replies as $reply)
                   <div class="container" style="padding-top:10px;">
                        <div class="card w-75">
                                <div class="card-body" style="height: auto; padding-bottom:25px;">
                                <h5 class="card-title">{{$reply->user->name}}<span style="float:right; font-size:13px;">Date: {{$reply->created_at}}</span></h5>
                                <p class="card-text">{{ $reply->body }}</p>
                                </div>
                           </div>
                       </div>
                   @endforeach

                   <div style="margin-left:400px; margin-top:20px;">
                   {{ $replies->links() }}
                   </div>
@endsection
