@extends('layouts/app')

@section('content')
    <h1>Posts</h1>

    @if(count($posts)>0)

        @foreach($posts as $post)
            <div>
                <h3><a href="http://localhost/lsapp/public/posts/{{$post->id}}" >{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
            @endforeach
            {{$posts->links()}} for the pagination
    @else
    <p>no posts found</p>
    @endif

    @endsection
