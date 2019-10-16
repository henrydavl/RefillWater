<?php

namespace App\Http\Controllers\Root;

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
        return view('root.dashboard', compact('pages', 'msg'));
    }
}
