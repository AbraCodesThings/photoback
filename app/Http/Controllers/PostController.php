<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index(){
    return 'test';
  }

  public function store(Request $request){
    return dd($request);
  }
}
