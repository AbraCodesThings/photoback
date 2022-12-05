<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Http\Controllers\Controller;


class ImageController extends Controller
{
    public function index(Request $request){
      //TODO
      return dd($request);
    }


    // public function getImage($id){
    //   return Image::where('id', $request['id'])->first();
    // }

    public function getUserImages($user){
      /** Returns a collection of an user's images. */
      return Image::where('uploader', $user->id)->get();
    }
    
}
