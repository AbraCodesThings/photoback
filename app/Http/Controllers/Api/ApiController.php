<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Image;


class ApiController extends Controller
{
    //API methods
    public function getImageURL($username, $title){
        $user = User::where('name', $username)->get()->first();
        $image_filename = Image::where('user_id', $user->id)->where('title', $title)->get()->first()->path;
        $url = env('APP_URL') . Storage::url('public/images/' . $username . '/' . $image_filename);
        return response()->file(Storage::path('public/images/' . $username . '/' . $image_filename));
    }

    public function getUserImages($username){
        $images = User::where('name', $username)->get()->first()->images;
        $results = [];
        $url = env('APP_URL');
        foreach($images as $image){
            $results[] = $url . Storage::url('public/images/' . $username . '/' . $image->path);
        }
        return response()->json($results);
    }

    public function getToken(Request $request){
        $validated = $request->validate([
            'name' => 'required | email',
            'password' => 'required | max:16'
        ]);

        if($validated){
            $user = User::where('name', $request['name'])->get()->first();

            if(!$user){
                return response()->json(['error' => 'User not found.'], 401);
            }

            if(!Hash::check($request['password'], $user->password)){
                return response()->json(['error' => 'Incorrect password']);
            } else {

            }
        }
    }
}
