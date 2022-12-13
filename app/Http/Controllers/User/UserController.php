<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageStorage\ImageStorageController;


class UserController extends Controller
{
    /* Returns an user based on their username
      TODO
    */
    public function getUser($name) {
      return User::where('name' == $name)->first();
    }

    public function getAllUsers() {
      return User::all();
    }

    public function addUser(Request $request){

      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);

      try {
        User::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => bcrypt($request['password'])
        ]);

        //en este punto debería mandar un email de confirmación
        return redirect('home');
      } catch (\Exception $e) {
        dd($e);
      }
    }

    public function removeUser(Request $request){

      $request->validate([
        'password' => 'required'
      ]);

      try {
        $user = Auth::user();
        $passwordMatches = Hash::check($request['password'], $user->password);
        if($passwordMatches){
          $user->delete();
          return redirect('home')->withSuccess('Account deleted.');
        } else {
          return redirect()->back()->withErrors('Incorrect password');
        }
      } catch (\Exception $e) {
        
        return redirect()->back()->withErrors('Something went wrong, contact the administrator' . $e);
      }
    }

    public function updateUser(Request $request){

      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);
      try {
        $user = Auth::user();
        $passwordMatches = Hash::check($request['password'], $user->password); 
        if($passwordMatches){
          $user->name = $request['name'];

          //TODO: resto de campos a actualizar

          $user->save();
          return redirect('home')->withSuccess('Account updated succesfully!');
        } else {
          return redirect()->back()->withErrors('Invalid password.');
        }
      } catch (\Exception $e) {
        //dd($e); //TODO
        return redirect()->back()->withErrors('Something went wrong, contact the administrator. '. $e);
      }
    }

    public function deleteUser(Request $request){
      $user = Auth::user();
      if(Hash::check($request["password"], $user->password)){
          Image::where('user_id', $user->id)->delete();
          Comment::where('user_id', $user->id)->delete();
          ImageStorageController::deleteUserDirectory($user);
          $user->delete();
          return redirect()->home()->withSuccess("Account deleted.");
      }
      else {
          return redirect()->back()->withErrors("Incorrect password.");
      }
      return redirect()->home()->withErrors("Something went wrong. Try again later.");
  }

}
