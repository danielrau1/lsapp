@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="http://localhost/lsapp/public/posts/create">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="http://localhost/lsapp/public/posts/{{$post->id}}/edit" >Edit</a></td>
                            <td>
                                {{ Form::open(['action' => ['PostsController@destroy',$post->id], 'method'=>'POST']) }}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete')}}
                                {{ Form::close() }}
                            </td>

                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
