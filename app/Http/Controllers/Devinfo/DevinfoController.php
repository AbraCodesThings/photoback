<?php

namespace App\Http\Controllers\Devinfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DevinfoController extends Controller
{
    //TODO

    public static function index(){
        $agent = new Agent();
        return view('testing.placeholder', [
            'agent' => $agent,
        ]);
    }
}
