<?php

namespace Tests\Feature;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_add_todo_route()
    // {
    //     $response = $this->post(route('todo.store'));
    //     $response->assertStatus(200);
    // }

    public function test_add_todo(){
        $response = $this->post(route('todo.store'),['content'=>'Todo de test','due_date'=>Carbon::tomorrow()]);
        
        $response->assertRedirect('/welcome');
        
        $this->assertCount(1,Todo::all());

    }
    public function test_cannot_add_null_todo(){
        // $response = $this->post(route('todo.store'),['content'=>'','due_date'=>'']);
        // $response->assertSessionHasErrors(['content','due_date']);

        $response = $this->post(route('todo.store'),['content'=>'','due_date'=>'']);
        $response->assertSessionHasErrors(['content','due_date']);


    }

    public function test_a_todo_can_be_updated(){
        $this->post('todo',['content'=>'faire des tests','due_date'=>Carbon::tomorrow()]);
        $todo = Todo::first();

        $response = $this->put('todo/'.$todo->id,['content'=>'faire encore des tests','due_date'=>Carbon::now()->addDays(3)]);
        
        $this->assertEquals('faire encore des tests',Todo::first()->content);
        $this->assertEquals(Carbon::now()->addDays(3),Todo::first()->due_date);
        $response->assertRedirect(route('todo.show',$todo));
    }

    public function test_a_todo_can_be_deleted(){
        $this->post('todo',['content'=>'faire des tests','due_date'=>Carbon::tomorrow()]);
        $todo = Todo::first();

        $response = $this->delete('todo/'.$todo->id);
        // $this->assertEquals(0,Todo::all()- >count());
        $this->assertCount(0,Todo::all());

        $response->assertRedirect(route('welcome'));
    }    

}
