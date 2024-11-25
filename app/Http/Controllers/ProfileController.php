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

    public function addevent(Request $request){

        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            // 'date' => 'required|date',
            // 'location' => 'required|string|max:800'
        ]);

        $user = User::where('name', $request->name)->first();

        if ($user) {
            $user->event()->create([
                'name' => $request->name,
                'description' => $request->description
            ]);
        } 

        return view('eventform');
    }
}
