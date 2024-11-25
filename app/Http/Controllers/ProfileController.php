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
            'date' => 'required|date',
            'location' => 'required|string|max:800'
        ]);

        // ini ngambil the current logged in user
        $user = auth()->user();

        if ($user) {
            $user->event()->create([
                'name' => $validated['name'],
                'description' => $validated['description'], 
                'date' => $validated['date'], 
                'location' => $validated['location']
            ]);
        } 

        return redirect()->route('profile');
    }
}
