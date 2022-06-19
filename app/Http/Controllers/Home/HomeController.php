<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    
    public static function index(){
        $agent = new Agent();
        return view('home.home', [
            'agent' => $agent,
        ]);
    }
}
