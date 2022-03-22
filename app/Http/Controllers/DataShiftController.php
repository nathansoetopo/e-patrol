<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataShiftController extends Controller
{
    public function showShiftAdmin()
    {
        return view('pages.admin.SuperAdmin-DataShift');
    }



    public function showShiftHRD()
    {
        return view('pages.hrd.HR-Datashift');
    }

  
}
