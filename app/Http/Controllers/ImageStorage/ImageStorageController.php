<?php

namespace App\Http\Controllers\ImageStorage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ImageStorageController extends Controller {
    public function upload(Request $request){
        /* 
            Upload function.

            This function should assign an unique name to the file in the filesystem
            and return whether it is successful or not.
        */
            
            // $filename = $request->file('image')->getClientOriginalName();
            $filename = 'test';
            $success = $request->file('image')->store(Auth::user() . '/' . $filename); 
            return $success;
    }
    public function get($username, $filename){
        /* Check that the image is public, TODO */

        return Storage::url($username . '/' . $filename);
    }
    public function getAll($username){
        return Storage::getAll($username);
    }
    public function delete($username, $filename){
        return Storage::delete($username . '/' . $filename);
    }
    public function update($username, $filename){
        return Storage::update($username . '/' . $filename);
    }
}