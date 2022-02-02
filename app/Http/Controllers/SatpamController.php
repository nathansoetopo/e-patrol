<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SatpamController extends Controller
{
    public function index()
    {
        return view('satpam.home');
    }
}
