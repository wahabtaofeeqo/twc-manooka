<?php

namespace App\Http\Controllers\Agents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function index() {
        return Inertia::render('Agent/Index');
    }
}
