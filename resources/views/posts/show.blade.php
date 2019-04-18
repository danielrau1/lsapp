@extends('layouts/app')

@section('content')
    <a href="http://localhost/lsapp/public/posts">Go Back</a>
    <h1>{{$post->title}}</h1>

   <div>
       {!!$post->body!!}
   </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr>
    @if(!Auth::guest())
        @if(Auth::user()->id==$post->user_id)
            <a href="http://localhost/lsapp/public/posts/{{$post->id}}/edit">Edit</a>

            {{ Form::open(['action' => ['PostsController@destroy',$post->id], 'method'=>'POST']) }}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete')}}
            {{ Form::close() }}
        @endif
    @endif
@endsection
