<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class AboutController extends Controller
{
    
    public static function index(){
        $agent = new Agent();
        return view('about.index', [
            'agent' => $agent,
        ]);
    }
}
