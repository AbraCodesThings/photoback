<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Models\User;

class LoginController extends Controller
{
    //TODO

    public function index(){
        $agent = new Agent();
        return view('login.show', [
            'agent' => $agent,
        ]);
    }

    public function authenticate(Request $request){

        $request->validate([
            'name' => 'required | max:25',
            'password' => 'required | max:16'
        ]);
        
        if(Auth::attempt(['name' => $request['name'], 'password' => $request['password']])){
            return redirect()->intended('home')->withSuccess('Logged in!');
        } else {
           // dd($request);  
            return redirect()->back()->withErrors('Something failed :(');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
