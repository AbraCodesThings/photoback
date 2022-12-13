<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;

class CommentController extends Controller
{
  public function index(){
    return 'test';
  }

  public function create($username, $image_title, Request $request){
    $request->validate([
      "text" => "required"
    ]);
    $user_id = Auth::user()->id;
    $uploader_id = User::where('name', $username)->get()->first()->id;
    $image_id = Image::where('user_id', $uploader_id)->where('title', $image_title)->get()->first()->id;
    
    $comment = new Comment;
    $comment->comment = $request['text'];
    $comment->user_id = $user_id;
    $comment->image_id = $image_id;
    $comment->save();
    
    return redirect()->back()->withSuccess("Comment posted!");
  }
}
