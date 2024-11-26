<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

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
}
