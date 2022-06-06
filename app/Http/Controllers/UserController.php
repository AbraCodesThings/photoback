<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /* Returns an user based on their username
      TODO
    */
    public function getUser($name) {
      return User::where('name' = $name)->first();
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
        return redirect('home');
      } catch (\Exception $e) {
        dd($e);
      }
    }

    public function removeUser(Request $request){

      $request->validate([
        'name' => 'required'
      ]);
      try {
        User::where('name', $name)->delete();
      } catch (\Exception $e) {
        dd($e);
      }
    }

    public function updateUser(Request $request){

      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);

      try {
        User::where('name', $request['name'])->update(['name', 'email', 'password']);
        return true;
      } catch (\Exception $e) {
        dd($e);
        return false;
      }
    }
}
