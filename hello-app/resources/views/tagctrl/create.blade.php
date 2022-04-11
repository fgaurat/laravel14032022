@extends('default')

@section('content')
<h1>tag Form</h1>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('tagctrl.store')}}"  method="POST">
    @csrf
     <input type="text" name="name">

     <button type="submit">ok</button>

</form>
@endsection