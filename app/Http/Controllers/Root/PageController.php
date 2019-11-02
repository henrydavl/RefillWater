<?php

namespace App\Http\Controllers\Root;

use App\Gallon;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('root');
    }

    public function dashboard()
    {
        $pages = 'dash';
        $msg = 'Welcome Root '.Auth::user()->name;
        $tic = Ticket::all()->where('submitted_by', Auth::id())->count();
        $user = User::all()->where('role_id', 4)->count();
        return view('root.dashboard', compact('pages', 'msg', 'tic', 'user'));
    }
}
