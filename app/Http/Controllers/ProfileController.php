<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function profile(Request $request){

        $user = User::all();

        return view('profile', [
            'user' -> $user
        ]);
    }

    public function addevent(){

        $user = User::where('username', $request->username)->first();

        $user->tweets()->create([
            'tweet' => $request->tweet
        ]);
    }
}
