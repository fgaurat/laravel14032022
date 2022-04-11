@extends('default')

@section('title', 'formulaire')

@section('content')
    <form action="{{route('is_even')}}" method="POST">
        @csrf
        <input type="text" name="value">
        <button type="submit">ok</button>
    </form>
@endsection