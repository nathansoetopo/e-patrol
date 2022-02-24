<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.SuperAdmin-Dashboard');
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
}
