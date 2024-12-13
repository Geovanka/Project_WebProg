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

        $admin = Admin::where('email', $request->email)->first();

        if ($admin){
            if(Hash::check($request->password, $admin->password)){
                Auth::guard('admin')->login($admin);
                return redirect()->intended('admin');
            }
        } else {
            $sponsor = Sponsor::where('email', $request->email)->first();

            if ($sponsor){
                if(Hash::check($request->password, $sponsor->password)){
                    Auth::guard('sponsor')->login($sponsor);
                    // Auth::login($sponsor);
                    return redirect()->intended('home');
                }
            } else {
                $user = User::where('email', $request->email)->first();

                if ($user){
                    if(Hash::check($request->password, $user->password)){
                        Auth::guard('user')->login($user);
                        // Auth::login($user);
                        return redirect()->intended('home');
                    }
                }
            }
        }
        return redirect()->back()->with('error', '* Invalid email or password...');
    }

    public function logout()
    {
        if(Auth::guard('sponsor')->check()){
            Auth::guard('sponsor')->logout();
            return redirect()->route('landing');
        } else if (Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect()->route('landing');
        } else if (Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect()->route('landing');
        }
    }

    public function createAdmin(){

        // Create a new admin and hash the password before saving it
        $admin = new Admin();
        $admin->email = 'admin@sponstore.com';
        $admin->password = Hash::make('admin123'); // Hash the password
        $admin->save();

        return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully');
    }
}
