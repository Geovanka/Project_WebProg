<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class InboxController extends Controller
{
    public function inbox(){
        $transactions = Transaction::with('user', 'event')->get();

        return view('inbox', compact('transactions'));
    }
}
