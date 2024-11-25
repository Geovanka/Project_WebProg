<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $newSponsor = Sponsor::create([
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email
        ]);

        return redirect()->route('admin');
    }
}
