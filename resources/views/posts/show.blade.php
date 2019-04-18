@extends('layouts/app')

@section('content')
    <a href="http://localhost/lsapp/public/posts">Go Back</a>
    <h1>{{$post->title}}</h1>

   <div>
       {!!$post->body!!}
   </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
<hr>
    <a href="http://localhost/lsapp/public/posts/{{$post->id}}/edit">Edit</a>

    {{ Form::open(['action' => ['PostsController@destroy',$post->id], 'method'=>'POST']) }}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete')}}
    {{ Form::close() }}


@endsection
