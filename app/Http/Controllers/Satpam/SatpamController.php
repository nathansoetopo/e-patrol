<?php

namespace App\Http\Controllers\Satpam;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Barcode;
use App\Models\Presensi;
use App\Exports\SatpamExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Validation\Validator;

class SatpamController extends Controller
{
    //data satpam HRD
    public function dataSatpamHRD()
    {
        $user = request()->user();
        if (!$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $satpam = User::role('satpam')->paginate(5);
        return view('pages.hrd.HR-DataSatpam', compact('satpam'));
    }

    //data satpam Admin
    public function dataSatpamAdmin()
    {
        $satpam = User::role('satpam')->paginate(5);
        return view('pages.admin.SuperAdmin-DataSatpam', compact('satpam'));
    }


    public function storeSatpam(Request $request)
    {

        // $satpam = 
    }

    public function isUserMemberOfTheShift($user, $shiftID)
    {

        return $user->shifts()->where('shift_id', $shiftID)->exists();
    }

    public function index()
    {
        return view('pages.satpam.Satpam-Dashboard');
        // return ResponseFormatter::success(request()->user(),'Ini adalah akun satpam');
    }

    public function showPresensi()
    {
        $user = request()->user();
        if (!$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $presensi = $user->presensi()->paginate(5);
        return view('pages.satpam.Satpam-Data-laporan', compact('presensi'));
    }

    public function reportSatpam($presensiID)
    {
        $user = request()->user();

        return view('pages.satpam.Satpam-Laporan-upload', compact('presensiID'));
        // return ResponseFormatter::success(request()->user(),'Ini adalah akun satpam');
    }


    public function indexPresensi()
    {
        // return view('pages.satpam.')
    }
    public function uploadPresensi($presensiID)
    {
        $user = request()->user();
        if (!$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect('satpam/laporan/')->with('status', 'Anda tidak punya kewenangan');
        }
        $presensi = Presensi::find($presensiID);
        if (!$presensi) {
            // return ResponseFormatter::error(null, 'Data presensi tidak ditemukan', 404);
            return redirect('satpam/laporan/')->with('status', 'Presensi tidak ditemukan');
        }
        $shift = $presensi->shifts()->first();
        if ($presensi->users()->where('user_id', request())->where('attachment', '!=', NULL)->exists()) {
            return redirect('satpam/laporan/')->with('status', 'Anda sudah melakukan presensi');
        }
        $now = Carbon::now();
        $start_time = Carbon::parse($presensi->start_time);
        $end_time = Carbon::parse($presensi->end_time);
        $diffStart = $start_time->diffInMinutes($now, false);
        $diffEnd = $end_time->diffInMinutes($now, false);
        if ($diffStart < 0) {
            // return ResponseFormatter::error(null, 'Waktu presensi belum dimulai', 403);
            return redirect('satpam/laporan/')->with('status', 'Waktu presensi belum dimulai');
        }
        if ($diffEnd < 0) {
            $validate = Validator::make(request()->all(), [
                'laporan' => 'required',
                'detail' => 'required',
                'attachment' => 'required|max:10240|mimes:jpg,png,jpeg',
            ]);
            if ($validate->fails()) {
                // return ResponseFormatter::error($validate, $validate->messages(), 417);
                return redirect('satpam/laporan/')->withInput()->withError($validate);
            }
            if (request()->hasFile('attachment')) {
                $name = time() . "_" . request()->attachment->getClientOriginalName();
                request()->attachment->move(public_path('Data/' . $shift->name . '/' . $presensi->name), $name);
            }
            $presensi->users()->updateExistingPivot($user->id, array(
                'laporan' => request()->laporan,
                'detail' => request()->detail,
                'attachment' => $name,
                'status' => 'ON TIME',
            ));
            // return ResponseFormatter::success($presensi, 'Anda presensi tepat waktu');
            return redirect('satpam/laporan/')->with('status', 'Anda presensi tepat waktu');
        } elseif ($diffEnd > 0) {
            $validate = Validator::make(request()->all(), [
                'laporan' => 'required',
                'detail' => 'required',
                'attachment' => 'required|max:10240|mimes:jpg,png,jpeg',
            ]);
            if ($validate->fails()) {
                // return ResponseFormatter::error($validate, $validate->messages(), 417);
                return redirect('satpam/laporan/')->withInput()->withError($validate);
            }
            if (request()->hasFile('attachment')) {
                $name = time() . "_" . request()->attachment->getClientOriginalName();
                request()->attachment->move(public_path('data/' . $user->name . '/' . $presensi->name), $name);
            }
            $presensi->users()->updateExistingPivot($user->id, array(
                'laporan' => request()->laporan,
                'detail' => request()->detail,
                'attachment' => $name,
                'status' => 'LATE',
            ));
            // return ResponseFormatter::success($presensi, 'Anda presensi terlambat');
            return redirect('satpam/laporan/')->with('status', 'Anda presensi terlambat');
        }
    }

    public function indexScanBarcode()
    {
        return view('pages.satpam.Satpam-scan');
    }
    public function scanBarcode($latitude, $longitude)
    {
        $user = request()->user();
        if (!$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        if ($user->presensi()->where('presensi.status', '=', 'SKIP')->exists()) {
            // return ResponseFormatter::error(null, 'User belum melakukan presensi', 403);
            return back()->withInput()->withToastError(null, 'User belum melakukan presensi', 403);
        }
        $validate = Validator::make(request()->all(), [
            'attachment' => 'required|max:10240|mimes:jpg,png,jpeg',
        ]);
        if ($validate->fails()) {
            // return ResponseFormatter::error($validate, $validate->messages(), 417);
            return back()->withInput()->withToastError($validate, $validate->messages(), 417);
        }
        if (request()->hasFile('attachment')) {
            $name = time() . "_" . request()->attachment->getClientOriginalName();
            request()->attachment->move(public_path('data/' . $user->name . '/laporan'), $name);
        }

        $barcode = Barcode::where('latitude', $latitude)->where('longitude', $longitude)->first();
        $earthRadius = 6371000;
        $myLatitude = -7.551995;
        $myLongitude = 110.853847;
        $latFrom = deg2rad($latitude);
        $lonFrom = deg2rad($longitude);
        $latTo = deg2rad($myLatitude);
        $lonTo = deg2rad($myLongitude);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        $range = $angle * $earthRadius;
        if ($range > 50) {
            $barcode->users()->attach($user->id, [
                'range' => $range,
                'attachment' => $name,
                'status' => 'OUT OF RANGE',
            ]);
            // return ResponseFormatter::success($barcode, 'Data laporan berhasil terupload');
            return response()->withInput()->withToastSuccess($barcode, 'Data laporan berhasil terupload');
        } elseif ($range <= 50) {
            $barcode->users()->attach($user->id, [
                'range' => $range,
                'attachment' => $name,
                'status' => 'IN RANGE',
            ]);
            // return ResponseFormatter::success($barcode, 'Data laporan berhasil terupload');
            return response()->withInput()->withToastSuccess($barcode, 'Data laporan berhasil terupload');
        }
    }

    public function adminSatPDF()
    {
        $satpam = User::select()->where('username', 'satpam')->get();
        $pdf = PDF::loadview('pages.admin.SuperAdmin-DataSatpampdf', compact('satpam'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('presensi.pdf');
    }
    public function hrdSatPDF()
    {
        $satpam = User::select()->where('username', 'satpam')->get();
        $pdf = PDF::loadview('pages.admin.SuperAdmin-DataSatpampdf', compact('satpam'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('presensi.pdf');
    }

    public function excel()
    {
        // return [
        //     (new UsersExport)->withHeadings(),
        // ];

        return Excel::download(new SatpamExport, 'Data Satpam.xlsx');
    }
}
