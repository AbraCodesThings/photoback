<?php

namespace App\Http\Controllers\UserConfig;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserConfigController extends Controller
{
    //
    public function index(){
        $agent = new Agent();
        return view('user-config.show', [
            'agent' => $agent,
        ]);
    }

    public function updateUser(Request $request){
        $request->validate([ 
            'name' => 'required',
            'password' => 'required',
        ]);
        $oldName = Auth::user()->name;
        $user = Auth::user();
        try{
            if(Hash::check($request->password, Auth::user()->password)){
                $user->name = $request['name'];
                if($request["changePassword"]){
                    if($request["newPassword"] != $request["newPasswordConfirm"]){
                        return redirect()->back()->withErrors("New Passwords must match.");
                    }
                    $user->password = bcrypt($request["newPassword"]);
                }
                $user->save();
                return redirect()->intended('home')->withSuccess('Account updated successfully!');
            } else {
                return redirect()->back()->withErrors(['msg' => "Authentication error."]);
            }
        } catch(Throwable $e) {
            return redirect()->back()->withErrors(['msg' => 'Backend error! Leave some feedback in GitHub please :)']);
        }
    }

    public function deleteUser(){
        try{
            $user = Auth::user();
            $user->delete();
            //TODO: borrar la carpeta de imágenes del usuario borrado
            return redirect()->intended('home')->withSuccess('Account deleted.');
        } catch(Exception $e){
            return redirect()->back()->withErrors("Whoops! Something went wrong.");
        }
    }

    
}
