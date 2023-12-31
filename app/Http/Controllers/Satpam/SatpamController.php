<?php

namespace App\Http\Controllers\Satpam;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Barcode;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Exports\SatpamExport;
use App\Exports\LaporanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
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
        $presensi = $user->presensi()->where('attachment','=',null)->latest('presensi_id')->first();
        if(!$presensi)
        {
            return redirect('/satpam/laporan')->with('status','Anda sudah presensi');
        }

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
        return view('pages.satpam.Satpam-Scan');
    }

    public function uploadLaporanBarcode($barcodeID)
    {
        $user = request()->user();
        if (!$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect('/satpam')->with('status','User tidak punya kewenangan');
        }
        $barcode = Barcode::find($barcodeID);
        $presensi = $user->presensi()->where('presensi.status', '=', 'SKIP')->latest('created_at')->first();
        if ($presensi) {
            // return ResponseFormatter::error(null, 'User belum melakukan presensi', 403);
            return redirect('/satpam')->with('status','User belum melakukan presensi');
        }
        // $dateNow = Carbon::parse(now())->format('Y:m:d');
        // if($user->barcodes()->where('barcodes.id',$barcodeID)->where('attachment','!=',null)->where('tanggal_laporan',$dateNow)->count() >= 2)
        // {
        //     return redirect('/satpam')->with('status','anda sudah melakukan scanning di titik ini');
        // }

        return view('pages.satpam.Satpam-barcode-upload',compact('barcode','user'));
    }


    public function scanBarcode($barcodeID)
    {
        $user = request()->user();
        if (!$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect('/satpam')->with('status','User tidak punya kewenangan');
        }
        $barcode = Barcode::find($barcodeID);
        $presensi = $user->presensi()->where('presensi.status', '=', 'SKIP')->latest('created_at')->first();
        if ($presensi) {
            // return ResponseFormatter::error(null, 'User belum melakukan presensi', 403);
            return redirect('/satpam')->with('status','User belum melakukan presensi');
        }
        $dateNow = Carbon::parse(now())->format('Y:m:d');
        $now = Carbon::parse(now())->format('H:i:s');
        if($user->barcodes()->where('barcodes.id',$barcodeID)->where('attachment','!=',null)->where('tanggal_laporan',$dateNow)->count() >= 2)
        {
            return redirect('/satpam')->with('status','anda sudah melakukan scanning di titik ini');
        }
        $laporan = $user->barcodes()->where('barcodes.id',$barcodeID)->where('attachment','!=',null)->first();
        // if($laporan)
        // {
        //     $time = Carbon::parse($laporan->jam_laporan);
        //     $diff = $time->diffInMinutes($now, false);
        //     return $time;
        //     // if ($diff < 2)
        //     // {
        //     //     return redirect('/satpam')->with('status','Waktu interval presensi kurang dari dua jam');
        //     // }
        // }
        // return $laporan;

        $validate = Validator::make(request()->all(), [
            'attachment' => 'required|max:10240|mimes:jpg,png,jpeg',
        ]);
        if ($validate->fails()) {
            // return ResponseFormatter::error($validate, $validate->messages(), 417);
            return back()->withInput()->withErrors($validate);
        }
        if (request()->hasFile('attachment') && request()->hasFile('attachment_selfie')) {
            $name = time() . "_" . request()->attachment->getClientOriginalName();
            request()->attachment->move(public_path('data/' . $user->name . '/laporan'), $name);
            // Front Cam
            $name2 = time() . "_" . request()->attachment_selfie->getClientOriginalName();
            request()->attachment_selfie->move(public_path('data/' . $user->name . '/laporan'), $name2);
        }

        $earthRadius = 6371000;
        $myLatitude = request()->latitude;
        $myLongitude = request()->longitude;
        $latFrom = deg2rad($barcode->latitude);
        $lonFrom = deg2rad($barcode->longitude);
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
                'selfie' => $name2,
                'deskripsi' => request()->deskripsi,
                'status' => 'OUT OF RANGE',
                'tanggal_laporan' => $dateNow,
                'jam_laporan' => $now,
            ]);
            // return ResponseFormatter::success($barcode, 'Data laporan berhasil terupload');
            return redirect('/satpam')->with('status', 'Data laporan berhasil terupload');
        } elseif ($range <= 50) {
            $barcode->users()->attach($user->id, [
                'range' => $range,
                'attachment' => $name,
                'selfie' => $name2,
                'status' => 'IN RANGE',
                'tanggal_laporan' => $dateNow,
                'jam_laporan' => $now,
            ]);
            // return ResponseFormatter::success($barcode, 'Data laporan berhasil terupload');
            return redirect('/satpam')->with('status', 'Data laporan berhasil terupload');
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

        // return Excel::download(new SatpamExport, 'Data Satpam.xlsx');
        return Excel::download(new SatpamExport, 'satpam.xlsx');
        // return (new SatpamExport)->download('invoices.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv']);
    }
}
