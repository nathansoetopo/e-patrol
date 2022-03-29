<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class DataShiftController extends Controller
{
    public function showShiftAdmin()
    {
        $shifts = Shift::paginate(5);
        return view('pages.admin.SuperAdmin-DataShift', compact('shifts'));
    }

    public function showShiftHRD()
    {
        return view('pages.hrd.HR-Datashift');
    }
}
