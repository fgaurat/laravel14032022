
<h1>todo Form</h1>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('todo.create')}}"  method="POST">
    @csrf
     <input type="text" name="content">
     <input type="text" name="tags" value="tag 1, tag 2, tag 3">
     <input type="checkbox" name="done">
    <select name="todo_list_id" >
        @foreach ($list as $l )
            <option value="{{$l->id}}">{{Str::limit($l->name,30)}}</option>
        @endforeach
    </select>

     <button type="submit">ok</button>

</form>