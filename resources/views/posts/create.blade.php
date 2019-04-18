@extends('layouts/app')

@section('content')
    <h1>Create Post</h1>

    {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST']) }}
    <div>
        {{Form::label('title','Title')}}
        {{Form::text('title','',['placeholder' => 'Title'])}}
    </div>

    <div>
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['id'=>'article-ckeditor','placeholder' => 'Body Text'])}}
    </div>
{{Form::submit('Submit')}}
    {{ Form::close() }}

@endsection

