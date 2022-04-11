<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $todoList = TodoList::factory()->create();
        // $todoList->todos()->save(Todo::factory()->make());

        // TodoList::factory(3)->create()->each(function ($todoList) {
        //     Todo::factory(5)->create(['todo_list_id'=>$todoList->id])->each(function ($todo) use($todoList) {
        //         $todoList->todos()->save($todo);
        //     });
        // });
        Tag::factory(3)->create();
        TodoList::factory(3)->create();
        
        $tags = Tag::all();
        $todoList = TodoList::all();
        
        $todoList->each(function ($list) use($tags){
            Todo::factory(5)->create(['todo_list_id' => $list->id])->each(function ($todo) use ($list,$tags) {
                $todo->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
                $list->todos()->save($todo);
            });

        });

    }
}
