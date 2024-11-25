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
}
