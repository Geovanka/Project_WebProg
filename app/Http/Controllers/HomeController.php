<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $sponsor = Sponsor::all();

        // $sponsorsInPairs = $sponsors->chunk(2);

        // dd($company);
        // return view('home', [
        //     'company' => $company
        // ]);

        // return view('home', [
        //     'sponsor' => $sponsor->chunk(2),
        // ]);
        return view('home', [
            'sponsor' => $sponsor
        ]);
    }

    public function search(Request $request){
        $query = $request->search;

        $sponsor = Sponsor::where('name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                            ->get();
        
        return view('searchResult', compact('sponsor'));
    }
}
