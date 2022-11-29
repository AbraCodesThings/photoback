<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Image\ImageController;

class GalleryController extends Controller
{
    public function userGalleryIndex(){
        $user = Auth::user();
        $images = ImageController::getUserImages($user);
        return view('gallery.show')->with('images',$images);
    }
}
