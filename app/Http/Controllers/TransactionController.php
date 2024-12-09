<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function store(Request $request){
        // $request->validate([
        //     'proposal' => 'required|file|mimes:pdf|max:2048',
        //     'sponsor_id' => 'required|integer',
        //     'user_id' => 'required|integer',
        //     'event_id' => 'required|integer',
        // ]);
        $proposalPath = $request->file('file_path')->store('files', 'public');

        Transaction::create([
            'sponsor_id' => $request->sponsor_id,
            'user_id' => $request->user_id,
            'event_id' => $request->event_id,
            'status' => 'pending', // Default status
            'file_path' => $proposalPath, // Save the file path
        ]);

        return back()->with('success', 'Proposal uploaded successfully!');
    }

    public function index(){
        $transactions = Transaction::where('sponsor_id', auth()->id())->get();
        return view('transaction.index', compact('transactions'));
    }

    public function accept($id){
        $transaction = Transaction::findOrFail($id);
        $transaction->update(['status' => 'accepted']);
        return redirect()->back()->with('success', 'Proposal accepted.');
    }

    public function reject($id){
        $transaction = Transaction::findOrFail($id);
        $transaction->update(['status' => 'rejected']);
        return redirect()->back()->with('error', 'Proposal rejected.');
    }

    public function negotiate(Request $request, $id){
        // dd($request->negotiation); 
        $transaction = Transaction::findOrFail($id);
        $transaction->negotiation = $request->negotiation;
        $transaction->update(['status' => 'negotiated']);
        $transaction->save();
        return redirect()->back();
    }

    public function organizationProposals(){
        $transactions = Transaction::where('user_id', auth()->id())->get();
        return view('inbox', compact('transactions'));
    }
}
