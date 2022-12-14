<?php

namespace App\Http\Controllers\ImageStorage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class ImageStorageController extends Controller {
   
    public function deleteUserDirectory($user){
        try{
            $path = Storage::path('public/images/' . $user->name);
            File::deleteDirectory($path);
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function deleteImageFile($user, $filename){
        try{
            $path = Storage::path('public/images/' . $user->name . '/' .$filename);
            File::delete($path);
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function update($username, $filename){
        return Storage::update($username . '/' . $filename);
    }
}