<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\User;
use App\Models\Comment;
use App\Http\Controllers\Controller;


class ImageController extends Controller
{
    public function index(Request $request){
      //TODO
      return dd($request);
    }

    public function viewImage($username, $image_title, Request $request){
      $user = User::where('name', $username)->get()->first();
      $image = Image::where('user_id', $user->id)
                ->where('title', $image_title)
                ->get()->first();
      $comments = $this->getComments($image);
      // return dd($image);
      return view("gallery.details")->with("image", $image)->with("user",$user)->with("comments",$comments);
    }


    // public function getImage($id){
    //   return Image::where('id', $request['id'])->first();
    // }

    public function getUserImages($user){
      /** Returns a collection of an user's images. */
      return Image::where('user_id', $user->id)->get();
    }

    private function getComments($image){
      $comments = Comment::where('image_id', $image->id)->get();
      return $comments;
  }
    
}
