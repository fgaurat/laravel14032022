<?php

use App\Http\Controllers\TagApiController;
use App\Http\Controllers\TodoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource("todo", TodoApiController::class);// ->middleware('auth:sanctum');
Route::apiResource("tag", TagApiController::class);


// Route::apiResource("todo", "App\Http\Controllers\TodoApiController"::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

