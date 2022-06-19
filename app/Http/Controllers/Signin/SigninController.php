<?php

namespace App\Http\Controllers\Signin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\User;

class SigninController extends Controller
{
    //TODO

    public static function index(){
        $agent = new Agent();
        return view('signin.show', [
            'agent' => $agent,
        ]);
    }

    public function createUser(Request $request){
        //$request->validate([ ... ])

        User::create([
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'email' => $request['email']
        ]);

        return redirect()->route('home');

        // return User::create([
        //     'name' => 'test',
        //     'password' => bcrypt('testpassword123'),
        //     'email' => 'test@test.com'
        // ]);
    }
}
