<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\User;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageStorage\ImageStorageController;


class ImageController extends Controller
{
    public function index(Request $request){
      //TODO
      return dd($request);
    }

    public function viewImage($username, $image_title, Request $request){
      try{
        $user = User::where('name', $username)->get()->first();
        $image = Image::where('user_id', $user->id)
        ->where('title', $image_title)
        ->get()->first();
        $comments = $this->getComments($image);
        // $comments = $image->comments();
        return view("gallery.details")->with("image", $image)->with("user",$user)->with("comments",$comments);
      } catch (Exception $e){
        return redirect()->back()->withErrors('Backend error! Cannot show image.');
      }
    }

    public function delete(Request $request){
      $request->validate([
        'image_id' => 'required'
      ]);
      try{
        $image = Image::find($request['image_id']);
        ImageStorageController::deleteImageFile($image->user, $image->path);
        $image->delete();
        return redirect('home')->withSuccess('Image deleted.');
      } catch (Exception $e){
        return redirect()->back()->withErrors('Backend error!. Image not deleted');
      }
    }

    public function getUserImages($user){
      /** Returns a collection of an user's images. */
      return Image::where('user_id', $user->id)->get();
    }

    private function getComments($image){
      $comments = Comment::where('image_id', $image->id)->get();
      return $comments;
  }
    
}
