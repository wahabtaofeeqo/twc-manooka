<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class PagesController extends Controller
{
    public function dashboard() {
        $user = Auth::user();
        if($user->type == User::AGENT)
            return to_route('agent.index');
        else return to_route('admin.index');
    }
}
