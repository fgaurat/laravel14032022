<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Http\Resources\TodoResourceCollection;
use App\Interfaces\RepositoryInterface;
use App\Models\Tag;
use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoApiController extends Controller
{
    private $todoRepo;
    
    public function __construct(RepositoryInterface $todoRepo)
    {
        $this->todoRepo = $todoRepo;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = Todo::with('tags')->get();
        // return response()->json($todos);
        return new TodoResourceCollection(Todo::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $r = $req->validate([
            'content' => 'required'
        ]);

        $tags = explode(',', $req->tags);

        collect($tags)->each(function (string $tag) {
            Tag::updateOrCreate(
                ['name' => $tag],
                ['name' => $tag]
            );
        });

        $tagsId = Tag::whereIn('name', $tags)->pluck('id')->toArray();


        $t = new Todo();
        $t->content = $req->content;
        $t->done = $req->has("done");
        $t->due_date = date(now());
        $t->todo_list_id = $req->todo_list_id;

        $tl = TodoList::where('id', $req->todo_list_id)->first();
        $tl->todos()->save($t);
        $t->tags()->attach($tagsId);

        $this->todoRepo->save($t);

        return response()->json($t);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        // return response()->json($todo);
        Log::info($todo);
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $r = $todo->update($request->all());
        
        return response()->json($todo);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json();
    }
}
