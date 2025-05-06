<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //this is the for the index
    public function index() {
        return view('auth.dashboard');
    }
}
