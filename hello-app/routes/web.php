<?php

use App\Http\Controllers\TodoApiController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/todos','App\Http\Controllers\TodoController@index')->name('todo.index');
Route::get('/todos/delete/{todo}','App\Http\Controllers\TodoController@delete')->name('todo.delete');
Route::get('/todos/show/{todo}','App\Http\Controllers\TodoController@show')->name('todo.show');
// Route::get('/todos/create','App\Http\Controllers\TodoController@create')->name('todo.create');

Route::match(['get', 'post'], '/todos/create', [
    'uses' => 'App\Http\Controllers\TodoController@create',
])->name('todo.create');

Route::get('/',"App\Http\Controllers\TodoListController@index")->name('todolist.index');

// Route::resource('todos',TodoApiController::class);


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
