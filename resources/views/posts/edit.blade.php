@extends('layouts/app')

@section('content')
    <h1>Edit Post</h1>

    {{ Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST']) }}
    <div>
        {{Form::label('title','Title')}}
        {{Form::text('title',$post->title,['placeholder' => 'Title'])}}
    </div>

    <div>
        {{Form::label('body','Body')}}
        {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','placeholder' => 'Body Text'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit')}}
    {{ Form::close() }}

@endsection
