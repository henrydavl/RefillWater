<?php

namespace App\Http\Controllers\Bureau;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('bureau');
    }

    public function dashboard(){
        $pages = 'dash';
        $msg = 'Welcome Bureau '.Auth::user()->name;
        return view('bureau.dashboard', compact('pages', 'msg'));
    }
}
