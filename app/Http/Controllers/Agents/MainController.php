<?php

namespace App\Http\Controllers\Agents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Event;

class MainController extends Controller
{
    public function index() {
        $events = Event::limit(5)->latest()->get();
        return Inertia::render('Agent/Index', [
            'events' => $events,
            'status' => session('status'),
        ]);
    }
}
