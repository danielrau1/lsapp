@extends('layouts/app')

@section('content')
    <h1>{{$title}}</h1>
    <p>this is services</p>
    @if(count($services)>0)
        <ul>
        @foreach($services as $service)
            <li>{{$service}}</li>
        @endforeach
        </ul>
    @endif
@endsection
