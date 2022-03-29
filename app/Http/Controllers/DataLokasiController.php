<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DataLokasiController extends Controller
{
    public function dataLokasiAdmin()
    {
        $barcodes = Barcode::paginate(5);
        return view('pages.admin.SuperAdmin-Datalokasi', compact('barcodes'));
    }

    public function dataLokasiHRD()
    {
        return view('pages.hrd.HR-DataLokasi');
    }

    public function storeBarcode()
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $validate = Validator::make(request()->all(), [
            'name' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);
        if ($validate->fails()) {
            // return ResponseFormatter::error($validate, $validate->messages(), 417);
            return redirect()->back()->withInput()->withError($validate);
        }
        $code = env('APP_URL') . '/api/satpam/' . request()->latitude . '/' . request()->longitude . '/scan';
        Barcode::create([
            'name' => request()->name,
            'barcode' => $code,
            'latitude' => request()->latitude,
            'longitude' => request()->longitude,
        ]);
        // return ResponseFormatter::success($barcode, 'Data barcode baru berhasil ditambahkan');
        return redirect()->back()->with('status', 'Data lokasi berhasil ditambahkan');
    }

    public function updateBarcode($barcodeID)
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
        $validate = Validator::make(request()->all(), [
            'name' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);
        if ($validate->fails()) {
            // return ResponseFormatter::error($validate, $validate->messages(), 417);
            return redirect()->back()->withInput()->withError($validate);
        }
        $code = env('APP_URL') . '/api/satpam/' . request()->latitude . '/' . request()->longitude . '/scan';
        $barcode->update([
            'name' => request()->name,
            'barcode' => $code,
            'latitude' => request()->latitude,
            'longitude' => request()->longitude,
        ]);
        // return ResponseFormatter::success($barcode, 'Data barcode baru berhasil ditambahkan');
        return redirect()->back()->with('status', 'Data lokasi berhasil diupdate');
    }

    public function updateBarcodeStatus($barcodeID)
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
        $barcode->status === 'ACTIVE' ? $barcode->update(['status'=>'INACTIVE']) : $barcode->update(['status'=>'ACTIVE']);
        return redirect()->back()->with('status', 'Data lokasi berhasil diupdate');
    }

    public function deleteBarcode($barcodeID)
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
        Barcode::destroy($barcodeID);
        return redirect()->back()->with('status', 'Data lokasi berhasil dihapus');
    }

    public function downloadBarcode($barcodeID)
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
        QrCode::size(500)
            ->format('svg')
            ->generate(env('APP_URL') . '/satpam/' . $barcodeID . '/scan', public_path('QrCode/'.$barcode->name.'-qrcode-'.$barcodeID.'.svg'));
        return response()->download('QrCode/'.$barcode->name.'-qrcode-'.$barcodeID.'.svg');
    }
}
