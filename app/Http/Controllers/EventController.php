<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Auth;

class EventController extends Controller
{
    function store(Request $request)  {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date|present',
            'client_name' => 'required',
            'client_phone' => 'required|min:10'
        ]);

        $payload = $request->all();
        $payload['user_id'] = Auth::user()->id;

        $model = Event::create($payload);

        //
        return redirect()->back();
    }
}
