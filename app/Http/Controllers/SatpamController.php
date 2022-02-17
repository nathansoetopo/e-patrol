<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shift;
use App\Models\Barcode;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Validator;

class SatpamController extends Controller
{

    public function isUserMemberOfTheShift($user, $shiftID){

        return $user->shifts()->where('shift_id', $shiftID)->exists();
    }

    public function index()
    {
        // return view('satpam.home');
        return ResponseFormatter::success(request()->user(),'Ini adalah akun satpam');
    }

    public function uploadPresensi($presensiID, $shiftID)
    {
        $user=request()->user();
        $shift=Shift::find($shiftID);
        if (!$this->isUserMemberOfTheShift($user, $shift->id)) {
            return ResponseFormatter::error(null, 'User bukan anggota di shift ini', 403);
        }
        if(!$user->hasRole('satpam'))
        {
            return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
        }
        $presensi=Presensi::find($presensiID);
        if(!$presensi)
        {
            return ResponseFormatter::error(null, 'Data presensi tidak ditemukan', 404);
        }
        $now=Carbon::now();
        $start_time=Carbon::parse($presensi->start_time);
        $end_time=Carbon::parse($presensi->end_time);
        $diffStart=$start_time->diffInMinutes($now,false);
        $diffEnd=$end_time->diffInMinutes($now,false);   
        if($diffStart < 0)
        {
            return ResponseFormatter::error(null, 'Waktu presensi belum dimulai', 403);
        }
        if($diffEnd < 0)
        {
            $validate=Validator::make(request()->all(),[
                'attachment' => 'required|max:10240|mimes:jpg,png,jpeg',
            ]);
            if($validate->fails())
            {
                return ResponseFormatter::error($validate, $validate->messages(), 417);
            }
            if(request()->hasFile('attachment'))
            {
                $name = time()."_".request()->attachment->getClientOriginalName();
                request()->attachment->move(public_path('Data/'.$shift->name.'/'.$presensi->name), $name);
            }
            $presensi->users()->updateExistingPivot($user->id, array(
                'attachment' => $name,
                'status' => 'ON TIME',
            ));
            return ResponseFormatter::success($presensi,'Anda presensi tepat waktu');
        }
        elseif($diffEnd > 0)
        {
            $validate=Validator::make(request()->all(),[
                'attachment' => 'required|max:10240|mimes:jpg,png,jpeg',
            ]);
            if($validate->fails())
            {
                return ResponseFormatter::error($validate, $validate->messages(), 417);
            }
            if(request()->hasFile('attachment'))
            {
                $name = time()."_".request()->attachment->getClientOriginalName();
                request()->attachment->move(public_path('data/'.$user->name.'/'.$presensi->name), $name);
            }
            $presensi->users()->updateExistingPivot($user->id, array(
                'attachment' => $name,
                'status' => 'LATE',
            ));
            return ResponseFormatter::success($presensi,'Anda presensi terlambat');
        }
    }

    public function scanBarcode($latitude, $longitude)
    {
        $user=request()->user();
        if(!$user->hasRole('satpam'))
        {
            return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
        }
        if($user->presensi()->where('presensi.status','=','SKIP')->exists())
        {
            return ResponseFormatter::error(null, 'User belum melakukan presensi', 403);
        }
        $validate=Validator::make(request()->all(),[
            'attachment' => 'required|max:10240|mimes:jpg,png,jpeg',
        ]);
        if($validate->fails())
        {
            return ResponseFormatter::error($validate, $validate->messages(), 417);
        }
        if(request()->hasFile('attachment'))
        {
            $name = time()."_".request()->attachment->getClientOriginalName();
            request()->attachment->move(public_path('data/'.$user->name.'/laporan'), $name);
        }

        $barcode=Barcode::where('latitude',$latitude)->where('longitude',$longitude)->first();
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
        if($range > 50)
        {
            $barcode->users()->attach($user->id,[
                'range' => $range,
                'attachment' => $name,
                'status' => 'OUT OF RANGE',
            ]);
            return ResponseFormatter::success($barcode,'Data laporan berhasil terupload');
        }elseif($range <= 50)
        {
            $barcode->users()->attach($user->id,[
                'range' => $range,
                'attachment' => $name,
                'status' => 'IN RANGE',
            ]);
            return ResponseFormatter::success($barcode,'Data laporan berhasil terupload');
        }
    }
}
