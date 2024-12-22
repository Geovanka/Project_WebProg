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

        if ($admin = Admin::where('email', $request->email)->first()){
            if(Hash::check($request->password, $admin->password)){
                Auth::guard('admin')->login($admin);
                return redirect()->route('admin.dashboard');
            }
        } else if($sponsor = Sponsor::where('email', $request->email)->first()) {
            if(Hash::check($request->password, $sponsor->password)){
                Auth::guard('sponsor')->login($sponsor);
                return redirect()->route('inbox');
            }
        } else if($user = User::where('email', $request->email)->first()) {
            if(Hash::check($request->password, $user->password)){
                Auth::guard()->login($user);
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('error', '* Invalid email or password...')->withInput()->with('redirect', session()->forget('url.intended'));
    }

    public function logout()
    {
        if(Auth::guard('sponsor')->check()){
            $user = Auth::guard('sponsor')->user();
            $user->touch();
            Auth::guard('sponsor')->logout();
            return redirect()->route('landing');
        } else if (Auth::guard()->check()){
            $user = Auth::guard()->user();
            $user->touch();
            Auth::guard()->logout();
            return redirect()->route('landing');
        } else if (Auth::guard('admin')->check()){
            $user = Auth::guard('admin')->user();
            $user->touch();
            Auth::guard('admin')->logout();
            return redirect()->route('landing');
        }
    }
}
