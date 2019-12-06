<?php

namespace App\Http\Controllers\Admin;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(){
        $pages = 'dash';
        $tic = Ticket::all()->where('submitted_by', Auth::id())->count();
        $user = User::all()->where('role_id', 4)->count();
        return view('admin.dashboard', compact('pages', 'tic', 'user'));
    }
}
