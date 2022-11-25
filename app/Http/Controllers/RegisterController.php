<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerHRD(Request $request)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|unique:users,nik',
            'bpjs' => 'nullable|string|unique:users,bpjs',
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:12',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return redirect()->back()->withInput()->withError($validator);
        }
        $user = User::create([
            'nik' => $request->nik,
            'bpjs' => $request->bpjs,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        $user->assignRole('hrd');
        // return ResponseFormatter::success($user, 'Akun Satpam berhasil dibuat');
        return redirect()->back()->with('status', 'Data HRD baru berhasil dibuat');
    }

    public function updateHRD(Request $request, $userID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return redirect()->back()->with('status', 'User ini bukan hrd');
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|unique:users,nik,' . $user->id,
            'bpjs' => 'nullable|string|unique:users,bpjs,' . $user->id,
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|min:12',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return redirect()->back()->withInput()->withError($validator);
        }
        $user->update([
            'nik' => $request->nik,
            'bpjs' => $request->bpjs,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('status', 'Data HRD berhasil diupdate');
        // return ResponseFormatter::success($user,'Akun HRD berhasil diupdate');
    }

    public function updateHRDStatus($userID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return redirect()->back()->with('status', 'User ini bukan hrd');
        }
        $user->status === 'ACTIVE' ? $user->update(['status' => 'INACTIVE']) : $user->update(['status' => 'ACTIVE']);
        return redirect()->back()->with('status', 'Data HRD berhasil diupdate');
    }

    public function destroyHRD($userID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return redirect()->back()->with('status', 'User ini bukan hrd');
        }
        User::destroy($userID);
        // return ResponseFormatter::success($user,'Akun HRD berhasil dihapus');
        return redirect()->back()->with('status', 'Data HRD berhasil dihapus');
    }

    public function registerSatpam(Request $request)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|unique:users,nik',
            'bpjs' => 'nullable|string|unique:users,bpjs',
            'name' => 'required|string',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return redirect()->back()->withInput()->withError($validator);
        }
        $user = User::create([
            'nik' => $request->nik,
            'bpjs' => $request->bpjs,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        $user->assignRole('satpam');
        // return ResponseFormatter::success($user, 'Akun Satpam berhasil dibuat');
        return redirect()->back()->with('status', 'Data satpam baru berhasil dibuat');
    }

    public function updateSatpam(Request $request, $userID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return redirect()->back()->with('status', 'User ini bukan satpam');
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|unique:users,nik,' . $user->id,
            'bpjs' => 'nullable|string|unique:users,bpjs,' . $user->id,
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|min:12',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withError($validator);
        }
        $user->update([
            'nik' => $request->nik,
            'bpjs' => $request->bpjs,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        // return ResponseFormatter::success($user, 'Akun Satpam berhasil diupdate');
        return redirect()->back()->with('status', 'Data satpam berhasil diupdate');
    }

    public function updateSatpamStatus($userID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return redirect()->back()->with('status', 'User ini bukan satpam');
        }
        $user->status === 'ACTIVE' ? $user->update(['status' => 'INACTIVE']) : $user->update(['status' => 'ACTIVE']);
        return redirect()->back()->with('status', 'Data satpam berhasil diupdate');
    }

    public function destroySatpam($userID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return redirect()->back()->with('status', 'User ini bukan satpam');
        }
        User::destroy($userID);
        // return ResponseFormatter::success($user, 'Akun Satpam berhasil dihapus');
        return redirect()->back()->with('status', 'Data satpam berhasil dihapus');
    }
}
