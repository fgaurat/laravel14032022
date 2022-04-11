<?php

namespace App\Http\Controllers;

use App\Events\TodoCreateEvent;
use App\Interfaces\RepositoryInterface;
use App\Models\Tag;
use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{

    private $todoRepo;
    
    public function __construct(RepositoryInterface $todoRepo)
    {
        $this->middleware('auth');
        $this->todoRepo = $todoRepo;
    }

    public function index(){
        // if (! Gate::allows('is-admin')) {
        //     abort(403);
        // }        
        
        $this->authorize('index',Todo::class);
        $todos = $this->todoRepo->findAll();
        return view('todo.index',compact('todos'));
    }
    
    public function delete(Todo $todo){
        $todo->delete();

        return redirect()->route('todo.index')->withSuccess('Todo delete ok.');
    }
    public function show(Todo $todo){
            
        return view('todo.show',compact('todo'));
    }
    
    public function create(Request $req){


        if( request()->isMethod('post') ){
            $r = $req->validate([
                'content' => 'required'
            ]);
            
            $tags = explode(',',$req->tags);

            collect($tags)->each(function (string $tag) {
                Tag::updateOrCreate(
                    ['name' => $tag],
                    ['name' => $tag]
                );
            });    

            $tagsId = Tag::whereIn('name',$tags)->pluck('id')->toArray();
        

            $t = new Todo();
            $t->content = $req->content;
            $t->done = $req->has("done");
            $t->due_date = date(now());
            $t->todo_list_id = $req->todo_list_id;

            $tl = TodoList::where('id',$req->todo_list_id)->first();
            $tl->todos()->save($t);
            $t->tags()->attach($tagsId);

            $this->todoRepo->save($t);

            event(new TodoCreateEvent());
            //TodoCreateEvent::dispatch();


            // $t->save();

            // Todo::create([
            //     'content'=>$req->content,
            //     'done'=>$req->has("done"),
            //     'due_date'=>date(now())
            // ]);
            return redirect()->route('todo.index')->withSuccess('Todo create ok.');   
        }
        else{
            $list = TodoList::all();
        }
        return view('todo.create',compact('list'));
    }
    
}
