<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use Illuminate\Support\Facades\Hash;


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

}
