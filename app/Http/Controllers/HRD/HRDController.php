<?php

namespace App\Http\Controllers\HRD;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Barcode;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HRDController extends Controller
{

    public function isUserMemberOfTheShift($user, $shiftID)
    {

        return $user->shifts()->where('shift_id', $shiftID)->exists();
    }

    public function index()
    {
        return view('pages.hrd.HR-Dashboard');
        // return ResponseFormatter::success(request()->user(),'Ini adalah akun HRD');
    }

    public function dataHRDAdmin()
    {
        $hrd = User::role('hrd')->paginate(5);
        return view('pages.admin.SuperAdmin-DataHRD',compact('hrd'));
    }

    public function showPresensiOnShift($shiftID)
    {
        $user = request()->user();
        $shift = Shift::find($shiftID);
        if (!$shift) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return back()->withInput()->withToastError(null, 'Data Shift tidak ditemukan', 404);
        }
        if (!$this->isUserMemberOfTheShift($user, $shift->id)) {
            // return ResponseFormatter::error(null, 'User bukan anggota di shift ini', 403);
            return back()->withInput()->withToastError(null, 'User bukan anggota di shift ini', 403);
        }
        if (!$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $presensi = Presensi::where('shift_id', $shiftID)->get();
        // return ResponseFormatter::success($presensi, 'Data presensi berhasil didapatkan');
        return response()->withInput()->withToastSuccess($presensi->load('roles'), 'Data Presensi berhasil didapatkan');
    }

    public function storePresensi()
    {
        $user = request()->user();
        $shift = Shift::find(request()->shiftID);
        if (!$user->hasRole('hrd')) {
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
                // return ResponseFormatter::error(null, 'Data presensi sudah', 403);
                return back()->withInput()->withToastError(null, 'Data presensi sudah ada', 403);
            }
            foreach ($users as $u) {
                $presensi->users()->attach($u->id);
            }
            // return ResponseFormatter::success($presensi, 'Data presensi baru untuk besok berhasil ditambahkan');
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

    public function deletePresensi($shiftID)
    {
        $user = request()->user();
        $shift = Shift::find($shiftID);
        if (!$shift) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return back()->withInput()->withToastError(null, 'Data shift tidak ditemukan', 404);
        }
        if (!$this->isUserMemberOfTheShift($user, $shift->id)) {
            // return ResponseFormatter::error(null, 'User bukan anggota di shift ini', 403);
            return back()->withInput()->withToastError(null, 'User bukan anggota di shift ini', 403);
        }
        if (!$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan ', 403);
        }
        Presensi::destroy($shiftID);

        $satpam = User::role('satpam')->get();
        // return ResponseFormatter::success(null, 'Data presensi berhasil dihapus');
        return response()->withInput()->withToastSuccess(null, 'Data Presensi berhasil dihapus');
    }
}
