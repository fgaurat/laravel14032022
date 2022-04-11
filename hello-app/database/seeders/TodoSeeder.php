<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todoList = TodoList::factory()->create();
        $todoList->todo()->save(Todo::factory()->make());
        // TodoList::factory(3)->create()->each(function ($todoList) {
        //     Todo::factory(10)->create()->each(function ($todo) use($todoList) {
        //         // $todoList->todo()->save(Todo::factory()->make());
        //         $todo->todoList()->save($todoList);
        //     });
        // });


    }
}
