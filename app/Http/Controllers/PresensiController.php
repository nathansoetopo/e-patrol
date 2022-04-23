<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shift;
use App\Models\Barcode;
use App\Models\Presensi;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Exports\PresensiExport;
use Maatwebsite\Excel\Facades\Excel;


class PresensiController extends Controller
{
    public function index()
    {
        $presensi = Presensi::paginate(5);
        $shifts = Shift::all();
        return view('pages.admin.SuperAdmin-Datapresensi', compact('presensi', 'shifts'));
    }

    public function indexHRD()
    {
        $user = request()->user();
        $presensi = $user->shifts()->with('presensi')->paginate(5);
        /* $data = array();
        foreach($presensi as $p)
        {
            array_push($data, $p);
        } */
        $shifts = Shift::all();
        return view('pages.hrd.HR-Datapresensi', compact('presensi', 'shifts'));
    }

    public function storePresensi()
    {
        $user = request()->user();
        $shift = Shift::find(request()->shiftID);
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $users = $shift->users()->whereHas('roles', function ($query) {
            $query->where('name', '=', 'satpam');
        })->get();
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
                'start_time' => $dateTomorrow . ' ' . $shift->start_time,
                'end_time' => $dateTomorrow . ' ' . $shift->end_time,
            ]);
            if (Presensi::where('shift_id', request()->shiftID)->where('start_time', $presensi->start_time)->where('end_time', $presensi->end_time)->count() > 1) {
                $presensi->delete();
                // return ResponseFormatter::error(null, 'Data presensi sudah ada', 403);
                return redirect()->back()->with('status', 'Data presensi sudah ada');
            }
            foreach ($users as $u) {
                $presensi->users()->attach($u->id);
            }
            // return ResponseFormatter::success($presensi, 'Data presensi baru untuk besok berhasil ditambahkan');
            return redirect()->back()->withInput()->with('status', 'Data Presensi baru untuk besok berhasil ditambahkan');
        } elseif ($diff <= 0) {
            $presensi = Presensi::create([
                'shift_id' => request()->shiftID,
                'name' => 'Presensi Tanggal ' . Carbon::now()->format('Y-m-d'),
                'start_time' => $dateNow . ' ' . $shift->start_time,
                'end_time' => $dateNow . ' ' . $shift->end_time,
            ]);
            if (Presensi::where('shift_id', request()->shiftID)->where('start_time', $presensi->start_time)->where('end_time', $presensi->end_time)->count() > 1) {
                $presensi->delete();
                // return ResponseFormatter::error(null, 'Data presensi sudah ada', 403);
                return redirect()->back()->with('status', 'Data presensi sudah ada');
            }
            foreach ($users as $u) {
                $presensi->users()->attach($u->id);
            }
            // return ResponseFormatter::success($presensi, 'Data presensi baru berhasil ditambahkan');
            return redirect()->back()->with('status', 'Data presensi baru berhasil ditambahkan');
        }
    }

    public function updatePresensiStatus($presensiID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $presensi = Presensi::find($presensiID);
        if (!$presensi) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data presensi tidak ditemukan');
        }
        $presensi->status === 'ACTIVE' ? $presensi->update(['status' => 'INACTIVE']) : $presensi->update(['status' => 'ACTIVE']);
        return redirect()->back()->with('status', 'Data presensi berhasil diupdate');
    }

    public function deletePresensi($presensiID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $presensi = Presensi::find($presensiID);
        if (!$presensi) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data presensi tidak ditemukan');
        }
        Presensi::destroy($presensiID);
        return redirect()->back()->with('status', 'Data presensi berhasil dihapus');
    }

    public function showUsersByPresensi($presensiID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $presensi = Presensi::find($presensiID);
        if (!$presensi) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data presensi tidak ditemukan');
        }
        $satpam = $presensi->users()->paginate(5);
        // return $satpam;
        if ($user->hasRole('admin')) {
            return view('pages.admin.SuperAdmin-DataPresensiUsers', [
                'satpam' => $satpam,
                'presensi' => $presensi,
            ]);
        } elseif ($user->hasRole('hrd')) {
            return view('pages.hrd.HR-DataPresensiUsers', [
                'satpam' => $satpam,
                'presensi' => $presensi,
            ]);
        }
    }

    public function showUsersByLaporan($barcodeID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $barcode = Barcode::find($barcodeID);
        if (!$barcode) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data barcode tidak ditemukan');
        }
        $satpam = $barcode->users()->paginate(5);
        // return $satpam;
        if ($user->hasRole('admin')) {
            return view('pages.admin.SuperAdmin-DataLaporanUsers', [
                'satpam' => $satpam,
                'barcode' => $barcode,
            ]);
        } elseif ($user->hasRole('hrd')) {
            return view('pages.hrd.HR-DataLaporanUsers', [
                'satpam' => $satpam,
                'barcode' => $barcode,
            ]);
        }
    }

    public function hrdPresPDF()
    {
        $presensi = Presensi::all();
        // $shifts = Shift::all();
        $pdf = PDF::loadview('pages.HRD.HR-Datapresensipdf', compact('presensi'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('presensi.pdf');
    }
    public function adminPresPDF()
    {
        $presensi = Presensi::all();
        // $shifts = Shift::all();
        $pdf = PDF::loadview('pages.admin.SuperAdmin-Datapresensipdf', compact('presensi'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('presensi.pdf');
    }

    public function excel()
    {
        return Excel::download(new PresensiExport, 'Presensi.xlsx');
    }
}
