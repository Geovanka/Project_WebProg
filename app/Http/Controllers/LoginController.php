<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sponsor;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                return redirect()->intended('home');
            }
        }

        $sponsor = Sponsor::where('email', $request->email)->first();

        if ($sponsor){
            if($sponsor->password == $request->password){
                Auth::login($sponsor);
                return redirect()->intended('sponsor.dashboard');
            }
        }

        $admin = Admin::where('email', $request->email)->first();

        if ($admin){
            if($request->password == $admin->password){
                Auth::login($admin);
                return redirect()->intended('admin');
            }
        }

        return redirect()->back()->with('error', '* Invalid email or password...');
    }
}
