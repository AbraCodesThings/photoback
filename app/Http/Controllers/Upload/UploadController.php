<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UploadController extends Controller {
    public function index(){
        if(Auth::check()){
            $agent = new Agent();
            return view('upload.show', [
                'agent' => $agent,
            ]);
        }
        return redirect()->route('login')->withErrors(['msg' => 'You are not logged in!']);
    }

    public function uploadImage(Request $request){
        /* Validación, TODO */
        $validated = $request->validate([
          'image' => 'required'
        ]);
  
        if($validated){
          $username = auth()->user()->name;
          $path = Storage::disk('local')->put('public/images/'.$username, $request->file('image'));
          echo($path);
          return redirect()->back()->withSuccess('Image uploaded successfully!');
        } 
  
        return redirect()->back()->withErrors("Something went wrong! Contact the administrator.");
      }
}