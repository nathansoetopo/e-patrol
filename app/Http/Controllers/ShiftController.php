<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function index()
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $shifts = Shift::all();
        // return ResponseFormatter::success($shifts->load('users'), 'Data semua shifts berhasil didapatkan');
        return response()->withInput()->withToastSuccess($shifts->load('users'), 'Data semua shift berhasil didapatkan');
    }

    public function store(Request $request)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return redirect()->back()->withInput()->withError($validator);
        }
        $shift = Shift::create([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        // return ResponseFormatter::success($shift, 'Shift baru berhasil ditambahkan');
        return redirect()->back()->with('status', 'Data shift baru berhasil ditambahkan');
    }

    public function update(Request $request, $shiftID)
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
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return redirect()->back()->withInput()->withError($validator);
        }
        $shift->update([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        // return ResponseFormatter::success($shift, 'Data shift berhasil diupdate');
        return redirect()->back()->with('status', 'Data shift berhasil diupdate');
    }

    public function show($shiftID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $shift = Shift::find($shiftID)->first();
        if (!$shift) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return back()->withInput()->withToastError(null, 'Data shift tidak ditemukan', 404);
        }
        // return ResponseFormatter::success($shift->load('users'), 'Data shift berhasil ditemukan');
        return response()->withInput()->withToastSuccess($shift->load('users'), 'Data shift berhasil ditemukan');
    }

    public function destroy($shiftID)
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
        Shift::destroy($shiftID);
        // return ResponseFormatter::success(null, 'Data shift berhasil dihapus');
        return redirect()->back()->with('status', 'Data shift berhasil dihapus');
    }

    public function assignHRDToShift(Request $request, $shiftID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $shift = Shift::find($shiftID);
        if (!$shift) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data shift tidak ditemukan');
        }
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|array',
            'user_id.*' => 'integer',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return back()->withInput()->withToastError($validator, $validator->messages(), 400);
        }
        foreach ($request->user_id as $userID) {
            $check = User::find($userID);
            if (!$check || !$check->hasRole('hrd')) {
                // return ResponseFormatter::error(null, 'User bukan termasuk HRD', 403);
                return back()->withInput()->withToastError(null, 'User bukan termasuk HRD', 403);
            }
            if($shift->users()->where('user_id',$userID)->exists())
            {
                return redirect()->back()->with('status', 'HRD dengan nama "'.$check->name.'" sudah masuk ke dalam shift');
            }
            $shift->users()->attach($userID);
        }
        // return ResponseFormatter::success($shift,'HRD Berhasil ditambahkan');
        return redirect()->back()->with('status', 'Data HRD berhasil ditambahkan');
    }

    public function assignSatpamToShift(Request $request, $shiftID)
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|array',
            'user_id.*' => 'integer',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return redirect()->back()->withInput()->withError($validator);
        }
        foreach ($request->user_id as $userID) {
            $check = User::find($userID);
            if (!$check || !$check->hasRole('satpam')) {
                // return ResponseFormatter::error(null, 'User bukan termasuk HRD', 403);
                return redirect()->back()->with('status', 'User bukan termasuk satpam');
            }
            if($shift->users()->where('user_id',$userID)->exists())
            {
                return redirect()->back()->with('status', 'Satpam dengan nama "'.$check->name.'" sudah masuk ke dalam shift');
            }
            $shift->users()->attach($userID);
        }
        // return ResponseFormatter::success($shift,'Satpam Berhasil ditambahkan');
        return redirect()->back()->with('status', 'Data satpam berhasil ditambahkan');
    }

    public function resignHRDFromShift($shiftID, $userID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $shift = Shift::find($shiftID);
        if (!$shift) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data shift tidak ditemukan');
        }
        $check = User::find($userID);
        if (!$check || !$check->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User bukan termasuk HRD', 403);
            return redirect()->back()->with('status', 'User bukan termasuk HRD');
        }
        $shift->users()->detach($userID);
        // return ResponseFormatter::success($shift,'Satpam Berhasil dihapus dari shift');
        return redirect()->back()->with('status', 'HRD berhasil di resign');
    }

    public function resignSatpamFromShift($shiftID, $userID)
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
        $check = User::find($userID);
        if (!$check || !$check->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User bukan termasuk HRD', 403);
            return redirect()->back()->with('status', 'User bukan termasuk satpam');
        }
        $shift->users()->detach($userID);
        // return ResponseFormatter::success($shift,'Satpam Berhasil dihapus dari shift');
        return redirect()->back()->with('status', 'Satpam berhasil di resign');
    }

    public function updateShiftStatus($shiftID)
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
        $shift->status === 'ACTIVE' ? $shift->update(['status' => 'INACTIVE']) : $shift->update(['status' => 'ACTIVE']);
        return redirect()->back()->with('status', 'Data shift berhasil diupdate');
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

        return view('pages.admin.SuperAdmin-DataShiftSatpam', compact('satpam','users','shiftID'));
    }

    public function showHRD($shiftID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $shift = Shift::find($shiftID);
        if (!$shift) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data shift tidak ditemukan');
        }
        $hrd = $shift->users()->whereHas('roles',function($query){
            $query->where('name','hrd');
        })->paginate(5);

        $users = User::role('hrd')->get();

        return view('pages.admin.SuperAdmin-DataShiftHRD', compact('hrd','users','shiftID'));
    }
}
