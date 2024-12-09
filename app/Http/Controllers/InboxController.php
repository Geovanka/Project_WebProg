<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;

class InboxController extends Controller
{
    public function inbox(){
        $transactions = Transaction::with('user', 'event')->get();

        return view('inbox', compact('transactions'));
    }

    public function inboxuser(){

        $query = Transaction::with(['sponsor', 'event']);

        if ($request->has('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        $transactions = $query->get();
        
        $userId = Auth::id(); 
        $events = Event::where('user_id', $userId)->get();

        // dd($transactions->toArray());

        return view('inboxuser', compact('transactions', 'events'));
    }
}
