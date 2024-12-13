<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;

class InboxController extends Controller
{
    public function inbox(Request $request){
        $query = Transaction::with('sponsor', 'event');

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

        $sponsorId = auth()->guard('sponsor')->id();
        $query->whereHas('event', function ($q) use ($sponsorId) {
            $q->where('sponsor_id', $sponsorId);
        });

        $transactions = $query->paginate(10);

        return view('inbox', compact('search', 'transactions'));
    }

    // public function inbox(Request $request){
    //     $userId = auth()->guard('sponsor')->id();

    //     $events = Transaction::where('sponsor_id', $userId)->get();

    //     return view('inbox', [
    //         'transactions' => $events
    //     ]);
    // }

    public function inboxuser(Request $request){

        // dd($query = Transaction::with(['sponsor', 'event']));
        $query = Transaction::with(['sponsor', 'event']);

        if ($request->has('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        // $userId = Auth::id();
        // $query->whereHas('event', function ($q) use ($userId) {
        //     $q->where('user_id', $userId);
        // });
        $transactions = $query->get();
        // $userId = Auth::id();
        $userId = auth()->id();
        $events = Transaction::where('user_id', $userId)->get();
        // dd($transactions->toArray());
        return view('inboxuser', compact('transactions', 'events'));
    }

    // public function inboxuser(Request $request)
    // {
    //     $userId = auth()->id();
    //     $events = Transaction::where('user_id', $userId)->get();
    //     return view('inbox', [
    //         'transactions' => $events
    //     ]);
    // }
}
