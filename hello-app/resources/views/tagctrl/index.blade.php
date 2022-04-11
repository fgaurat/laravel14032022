@extends('default')

@section('content')

<h1>tags</h1>

<ul>
    @foreach ($tags as $tag)
    <li>{{$tag->name}}</li>        
    @endforeach

</ul>

@endsection