<?php

namespace App\Http\Controllers\Bureau;

use App\Ticket;
use App\TopUp;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('bureau');
    }

    public function dashboard(){
        $pages = 'dash';
        $tic = Ticket::all()->where('submitted_by', Auth::id())->count();
        $user = User::all()->where('role_id', 4)->count();
        $daily = TopUp::where('admin_id', Auth::id())->where(DB::raw('substr(created_at, 1, 10)') ,'=', Carbon::today()->toDateString())->sum('amount');
        $montly = TopUp::where('admin_id', Auth::id())->where(DB::raw('substr(created_at, 6, 7)') ,'=', Carbon::now()->month)->sum('amount');
        return view('bureau.dashboard', compact('pages', 'tic', 'user', 'daily', 'montly'));
    }
}
