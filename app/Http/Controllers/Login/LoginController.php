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

    // public function authenticate(Request $request){

    //     $request->validate([
    //         'name' => 'required | max:25',
    //         'password' => 'required | max:16'
    //     ]);
        
    //     if(Auth::attempt(['name' => $request['name'], 'password' => $request['password']])){
    //         return redirect()->intended('home')->withSuccess('Logged in!');
    //     } else {
    //        // dd($request);  
    //         return redirect()->back()->withErrors('Something failed :(');
    //     }
    // }

    public function authenticate(Request $request){

        $request->validate([
            'name' => 'required | max:25',
            'password' => 'required | max:16'
        ]);

        //TODO: quizá hacer una condición de que valide o no

        if($this->checkUserExists($request) == false)
            return redirect()->back()->withErrors('That user does not exist!');
        if($this->checkPassword($request)){
            return redirect()->intended('home')->withSuccess('Logged in!');
        } else {
            return redirect()->back()->withErrors('Incorrect password! Try again?');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

    private function checkUserExists(Request $request){
        $user = User::where('name', $request['name'])->get()->first();
        if($user) return true;
        else return false;
    }

    private function checkPassword(Request $request){
        $success = Auth::attempt(['name' => $request['name'], 'password' => $request['password']]);
        return $success;
    }
}
