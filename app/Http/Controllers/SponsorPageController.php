<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorPageController extends Controller
{
    public function show($id){
        $sponsor = Sponsor::findOrFail($id);

        return view('sponsor', compact('sponsor'));
    }

    public function userData(Request $request){

        $user = auth()->user();
        $events = $user?->events;

        return view('submission', [
            'user' => $user,
            'events' => $events
        ]);
    }

}
