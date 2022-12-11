<?php

namespace App\Http\Controllers\UserConfig;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserConfigController extends Controller
{
    //
    public function index(){
        $agent = new Agent();
        $user = Auth::user();
        if($user){
            return view('user-config.show', [
                'agent' => $agent,
            ]);
        }
        return redirect()->intended('home');
    }

    public function updateUser(Request $request){
        $request->validate([ 
            // TODO
            'name' => 'required',
            'password' => 'required',
        ]);
        
        $user = Auth::user();
        $oldUserName = $user->name;
        //too many returns :(
        try{
            if(Hash::check($request->password, Auth::user()->password)){
                $user->name = $request['name'];
                $this->renameUserFolder($oldUserName, $request);
                $this->changePassword($user, $request);
                $user->save();
                return redirect()->intended('home')->withSuccess("Account updated successfully!");
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

    private function renameUserFolder($oldUserName, Request $request){
        if($oldUserName != $request['name'])
            return Storage::rename('public/images/' . $oldUserName, 'public/images/' . $request['name']);
        return false;
    }

    private function changePassword(User $user, Request $request){
        if($request["changePassword"]){
            if($request["newPassword"] != $request["newPasswordConfirm"]){
                return redirect()->back()->withErrors("New Passwords must match.");
            }
            $user->password = bcrypt($request["newPassword"]);
            return true;
        }
        return false;
    }

    
}
