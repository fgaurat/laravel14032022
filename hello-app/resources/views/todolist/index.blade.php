@extends('default')
@section('content')
<table class="table">

<thead></thead>
<tbody>

    @foreach ($list as $l)
        <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->name}}</td>
            <td>{{$l->todos->count()}}</td>
            <td></td>
        </tr>
    @endforeach

</tbody>


</table>
@endsection