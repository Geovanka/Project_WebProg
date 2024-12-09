<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;

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
