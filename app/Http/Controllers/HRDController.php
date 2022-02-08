<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class HRDController extends Controller
{
    public function index()
    {
        // return view('hrd.home');
        return ResponseFormatter::success(request()->user(),'Ini adalah akun HRD');
    }
}
