<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Image\ImageController;
use App\Models\User;

class GalleryController extends Controller
{
    public function userGalleryIndex($user){
        // if(!$user){
        //     $user = Auth::user();
        // }
        $user = User::where('name', $user)->first();
        if($user){
            $images = ImageController::getUserImages($user);
            return view('gallery.show')->with('images',$images)->with('user', $user);
        }
        return redirect('home')->withErrors('That user does not exist.');
    }
}
