<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Models\User;


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
}