<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['content','done','due_date'];

    public function todoList()
    {
        return $this->belongsTo(TodoList::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'tag_todo');
    }

}
