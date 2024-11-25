<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admin(){

        $sponsor = Sponsor::all();

        return view('admin', [
            'sponsor' => $sponsor
        ]);
    }

    public function addSponsor(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'email' => 'requred|email'
        ]);

        sponsor()->create([
            'name' => $validated['name'],
            'description' => $validated['description'], 
            'email' => $validated['email']
        ]);

        return redirect()->route('admin');
    }
}
