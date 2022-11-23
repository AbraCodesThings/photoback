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
        $request->validate([ 
            'name' => 'required',
            'password' => 'required',
            'password_confirm' => 'required'
        ]);
        
        // Verify that the new user is not in the DB
        // TODO

        

        // Create user
        
        try{
            if($request['password'] == $request['password_confirm']){
                User::create([
                    'name' => $request['name'],
                    'password' => bcrypt($request['password']),
                    'email' => $request['email']
                ]);
                return redirect()->route('home');
            }
            return redirect()->back()->withErrors(['msg' => 'Passwords must match.']);
        } catch(Throwable $e) {
            return redirect()->back()->withErrors(['msg' => 'Backend error! Leave some feedback in GitHub please :)']);
        }
    }
}
