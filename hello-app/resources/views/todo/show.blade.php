@extends('default')

@section('content')
    

<h2>Todo</h2>
<hr>
<x-hello name="Fred">
    content of the hello component
</x-hello>

<hr>
<h3>{{$todo->todoList->name}}</h3>
<p>
    {{$todo->content}}
</p>

<p>
    @foreach ($todo->tags as $tag)
    {{$tag->name}}
    @endforeach
</p>

@endsection