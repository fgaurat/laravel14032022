<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PairController extends Controller
{
    public function index(Request $request,int $value){
        abort(404," c'est pas bon");
        $result = $value%2==0;
        return view('pair.index',compact('value','result'));
    }

    public function post(Request $request){
        $value = $request->input("value");
        $result = $value%2==0;
        return view('pair.index',compact('value','result'));
    }



}
