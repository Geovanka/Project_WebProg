<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        // $company = Company::all();
        // $company = Company::first();

        $sponsor = Sponsor::first();

        // dd($company);
        // return view('home', [
        //     'company' => $company
        // ]);

        return view('home', [
            'sponsor' => $sponsor
        ]);
    }
}
