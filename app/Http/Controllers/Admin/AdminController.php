<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();
        return view('pages.admin.SuperAdmin-Dashboard', compact('shifts'));
        //return ResponseFormatter::success(request()->user(),'Ini adalah akun admin');
    }

    public function showAllAccounts()
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError('User Tidak Punya Kewenangan', 403);
        }
        $users = User::all();
        // return ResponseFormatter::success($users->load('roles'), 'Data semua akun berhasil didapatkan'); 
        return response()->withInput()->withToastSuccess($users->load('roles'), 'Data Semua Akun Berhasil didapatkan');
    }

    public function showRoleAccounts($roleName)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError('User Tidak Punya Kewenangan', 403);
        }
        $users = User::role($roleName)->get();
        // return ResponseFormatter::success($users->load('roles'), 'Data semua akun ' . $roleName . ' berhasil didapatkan');
        return response()->withInput()->withToastSuccess($users->load('roles'), 'Data Semua Akun' . $roleName . 'Berhasil didapatkan');
    }

    public function storePresensi()
    {
        $user = request()->user();
        $shift = Shift::find(request()->shiftID);
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $users = User::role('satpam')->get();
        $dateNow = Carbon::parse(now())->format('Y:m:d');
        $dateTomorrow = Carbon::tomorrow()->format('Y:m:d');
        $shiftTime = $dateNow . ' ' . $shift->end_time;
        $time1 = Carbon::now();
        $time2 = Carbon::parse($shiftTime);
        $diff = $time2->diffInMinutes($time1, false);
        if ($diff > 0) {
            $presensi = Presensi::create([
                'shift_id' => request()->shiftID,
                'name' => 'Presensi Tanggal ' . Carbon::tomorrow()->format('Y-m-d'),
                'start_time' => $dateNow . ' ' . $shift->start_time,
                'end_time' => $dateNow . ' ' . $shift->end_time,
            ]);
            if (Presensi::where('start_time', $presensi->start_time)->where('end_time', $presensi->end_time)->count() > 1) {
                $presensi->delete();
                // return ResponseFormatter::error(null, 'Data presensi sudah ada', 403);
                return back()->withInput()->withToastError(null, 'Data presensi sudah ada', 403);
            }
            foreach ($users as $u) {
                $presensi->users()->attach($u->id);
            }
            return ResponseFormatter::success($presensi, 'Data presensi baru untuk besok berhasil ditambahkan');
            return redirect()->back()->withInput()->withToastSuccess($presensi, 'Data Presensi baru untuk besok berhasil ditambahkan');
        } elseif ($diff <= 0) {
            $presensi = Presensi::create([
                'shift_id' => request()->shiftID,
                'name' => 'Presensi Tanggal ' . Carbon::now()->format('Y-m-d'),
                'start_time' => $dateNow . ' ' . $shift->start_time,
                'end_time' => $dateNow . ' ' . $shift->end_time,
            ]);
            if (Presensi::where('start_time', $presensi->start_time)->where('end_time', $presensi->end_time)->count() > 1) {
                $presensi->delete();
                // return ResponseFormatter::error(null, 'Data presensi sudah ada', 403);
                return back()->withInput()->withToastError(null, 'Data presensi sudah ada', 403);
            }
            foreach ($users as $u) {
                $presensi->users()->attach($u->id);
            }
            // return ResponseFormatter::success($presensi, 'Data presensi baru berhasil ditambahkan');
            return redirect()->back()->withInput()->withToastSuccess($presensi, 'Data Presensi baru berhasil ditambahkan');
        }
    }
}
