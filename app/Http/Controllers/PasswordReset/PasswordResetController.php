<?php

namespace App\Http\Controllers\PasswordReset;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\ResetPassword;
use Mail;

class PasswordResetController extends Controller
{
    //
    public function passwordReset(Request $request){
        $request->validate([
            'email' => 'email | required'
        ]);
        try{
            $tempPassword = Str::random(16);
            $user = User::where('email', $request['email'])->get()->first();
            if($user){
                $user->password = bcrypt($tempPassword);
                Mail::to($user->email)->send(new ResetPassword($user, $tempPassword));
                $user->save();
        
                return redirect()->back()->withSuccess('Password email sent!');
            }
            dd($user);
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Something failed! :(');
        }
    }
}
