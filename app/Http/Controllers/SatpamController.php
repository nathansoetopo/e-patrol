<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;

class SatpamController extends Controller
{
    public function index()
    {
        // return view('satpam.home');
        return ResponseFormatter::success(request()->user(),'Ini adalah akun satpam');
    }
}
