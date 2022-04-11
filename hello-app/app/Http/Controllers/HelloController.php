<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HelloController extends Controller
{
    public function index(Request $request,$name){
        Log::debug("index");

        Log::debug($name);
        
        return view('hello.index',compact("name"));
    }
}
