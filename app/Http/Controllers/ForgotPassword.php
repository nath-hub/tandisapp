<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPassword extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
             'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
     }


     public function reset(Request $request)
     {
         $request->validate([
             'token' => 'required',
             'email' => 'required|email',
             'password' => 'required|string|confirmed|min:8',
         ]);
 
         $status = Password::reset(
             $request->only('email', 'password', 'password_confirmation', 'token'),
             function ($user) use ($request) {
                 $user->forceFill([
                     'password' => Hash::make($request->password),
                     'remember_token' => Str::random(60)
                 ])->save();
             }
         );
 
         return $status == Password::PASSWORD_RESET
             ? redirect()->route('login')->with('status', __($status))
             : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
     }
}
