<?php

namespace App\Http\Controllers\Signin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageStorage\ImageStorageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;


class SigninController extends Controller
{
    //TODO

    public static function index(){
        $agent = new Agent();
        
        if(!Auth::check())
            return view('signin.show', [
                'agent' => $agent,
            ]);
        return redirect('home');
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
                    'email' => $request['email'],
                    'remember_token' => Str::random(10)
                ]);
                return redirect()->route('home')->withSuccess('Account created!');
            }
            return redirect()->back()->withErrors(['msg' => 'Passwords must match.']);
        } catch(Throwable $e) {
            return redirect()->back()->withErrors(['msg' => 'Backend error! Leave some feedback in GitHub please :)']);
        }
    }

    public function deleteUser(Request $request){
        $user = Auth::user();
        if(Hash::check($request["password"], $user->password)){
            Image::where('user_id', $user->id)->delete();
            Comment::where('user_id', $user->id)->delete();
            ImageStorageController::deleteUserDirectory($user);
            $user->delete();
            Auth::logout();
            return redirect()->home()->withSuccess("Account deleted.");
        }
        else {
            return redirect()->back()->withErrors("Incorrect password.");
        }
        return redirect()->home()->withErrors("Something went wrong. Try again later.");
    }

    private function deleteUserDirectory($user){
        $path = Storage::path('public/images/' . $user->name);
        File::deleteDirectory($path);
    }
}
