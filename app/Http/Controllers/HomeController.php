<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        // $company = Company::all();
        $company = Company::first();

        // dd($company);
        return view('home', [
            'company' => $company
        ]);
    }
}
