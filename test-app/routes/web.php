<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::post('todo',[TodoController::class,'store'])->name('todo.store');
Route::put('todo/{todo}',"App\Http\Controllers\TodoController@update")->name('todo.update');
Route::get('todo/{todo}',"App\Http\Controllers\TodoController@show")->name('todo.show');
Route::delete('todo/{todo}',"App\Http\Controllers\TodoController@delete")->name('todo.delete');