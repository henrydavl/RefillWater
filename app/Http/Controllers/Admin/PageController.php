<?php

namespace App\Http\Controllers\Admin;

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
        $msg = 'Welcome Admin '.Auth::user()->name;
        return view('admin.dashboard', compact('pages', 'msg'));
    }
}
