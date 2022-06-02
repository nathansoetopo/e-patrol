<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = request()->user();
        if (!$user->hasRole('hrd')) {
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $shifts = $user->shifts()->paginate(5);
        return view('pages.hrd.HR-Datashift',compact('shifts'));
    }

    public function showSatpam($shiftID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $shift = Shift::find($shiftID);
        if (!$shift) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data shift tidak ditemukan');
        }
        $satpam = $shift->users()->whereHas('roles',function($query){
            $query->where('name','satpam');
        })->paginate(5);

        $users = User::role('satpam')->get();

        return view('pages.hrd.HR-DataShiftSatpam', compact('satpam','users','shiftID'));
    }
}
