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
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan ', 403);
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|unique:users,nik',
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return back()->withInput()->withToastError($validator, $validator->messages(), 400);
        }
        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('hrd');
        // return ResponseFormatter::success($user,'Akun HRD berhasil dibuat');
        return response()->withInput()->withToastSuccess($user, 'Akun HRD berhasil dibuat');
    }

    public function updateHRD(Request $request, $userID)
    {
        $admin = request()->user();
        if (!$admin->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan ', 403);
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User ini bukan HRD', 403);
            return back()->withInput()->withToastError(null, 'User ini bukan HRD', 403);
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string',
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash',
            'email' => 'required|email',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withToastError($validator, $validator->messages(), 400);
        }
        $user->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->withInput()->withToastSuccess($user, 'Akun HRD berhasil diupdate');
        // return ResponseFormatter::success($user,'Akun HRD berhasil diupdate');
    }

    public function destroyHRD($userID)
    {
        $admin = request()->user();
        if (!$admin->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('hrd')) {
            // return ResponseFormatter::error(null, 'User ini bukan HRD', 403);
            return back()->withInput()->withToastError(null, 'User ini bukan HRD', 403);
        }
        User::destroy($userID);
        // return ResponseFormatter::success($user,'Akun HRD berhasil dihapus');
        return response()->withInput()->withToastSuccess($user, 'Akun HRD berhasil dihapus');
    }

    public function registerSatpam(Request $request)
    {
        $user = request()->user();
        if (!$user->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|unique:users,nik',
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return back()->withInput()->withToastError($validator, $validator->messages(), 400);
        }
        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('satpam');
        // return ResponseFormatter::success($user, 'Akun Satpam berhasil dibuat');
        return response()->withInput()->withToastSuccess($user, 'Akun Satpam berhasil dibuat');
    }

    public function updateSatpam(Request $request, $userID)
    {
        $admin = request()->user();
        if (!$admin->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return back()->withInput()->withToastError(null, 'User ini bukan Satpam', 403);
        }
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string',
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash',
            'email' => 'required|email',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withToastError($validator, $validator->messages(), 400);
        }
        $user->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // return ResponseFormatter::success($user, 'Akun Satpam berhasil diupdate');
        return response()->withInput()->withToastSuccess($user, 'Akun Satpam berhasil diupdate');
    }

    public function destroySatpam($userID)
    {
        $admin = request()->user();
        if (!$admin->hasRole('admin')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return back()->withInput()->withToastError(null, 'User tidak punya kewenangan', 403);
        }
        $user = User::find($userID);
        if (!$user || !$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User ini bukan Satpam', 403);
            return back()->withInput()->withToastError(null, 'User ini bukan satpam', 403);
        }
        User::destroy($userID);
        // return ResponseFormatter::success($user, 'Akun Satpam berhasil dihapus');
        return response()->withInput()->withToastSuccess($user, 'Akun Satpam berhasil dihapus');
    }
}
