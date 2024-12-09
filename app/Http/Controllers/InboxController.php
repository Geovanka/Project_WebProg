<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class InboxController extends Controller
{
    public function inbox(Request $request){
        $query = Transaction::with('user', 'event');

        $search = $request->search ?? '';

        if($request->has('search') && $request->search != ''){
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            })->orWhereHas('event', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }
        
        $transactions = $query->paginate(10);

        return view('inbox', compact('search', 'transactions'));
    }

    public function inboxuser(){

        $transactions = Transaction::with('sponsors', 'event')->get();

        return view('inboxuser', compact('transactions'));
    }
}
