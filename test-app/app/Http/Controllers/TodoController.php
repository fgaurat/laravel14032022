<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(StoreTodoRequest $request){

        Todo::create(
            [
                'content'=>$request->content,
                'due_date'=>$request->due_date,
            ]
        );
        return redirect('/welcome');
    }

    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->route('welcome');
    }

    public function update(StoreTodoRequest $request,Todo $todo){
        $todo->update([
            'content'=>$request->content,
            'due_date'=>$request->due_date
        ]);
        return redirect()->route('todo.show',$todo);
    }


}
