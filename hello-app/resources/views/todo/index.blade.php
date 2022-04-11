@extends('default')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-bs-dismiss="alert" >×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<table class="table">

<thead>
    <tr>
        <th>id</th>
        <th>content</th>
        <th>done</th>
        <th>due_date</th>
        <th>list</th>
        <th>tags</th>
    </tr>
</thead>
<tbody>




    @foreach ($todos as $todo)
        <tr>
            <td>{{$todo->id}}</td>
            <td>{{$todo->content}}</td>
            <td>{{$todo->done}}</td>
            <td>{{$todo->due_date}}</td>
            <td>{{Str::limit($todo->todolist->name,20)}}</td>
            <td>
                @foreach ($todo->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </td>
            <td>
                <a href="{{route('todo.delete',['todo'=>$todo->id])}}" class="btn btn-danger">delete</a>
            </td>
            <td>
                <a href="{{route('todo.show',['todo'=>$todo->id])}}" class="btn btn-primary">show</a>
            </td>
        </tr>
    @endforeach

</tbody>


</table>
@endsection