<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        // return view('admin.home');
        return ResponseFormatter::success(request()->user(),'Ini adalah akun admin');
    }

    public function showAllAccounts()
    {
        $user=request()->user();
        if(!$user->hasRole('admin'))
        {
            return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
        }
        $users=User::all();
        return ResponseFormatter::success($users->load('roles'),'Data semua akun berhasil didapatkan');
    }

    public function showRoleAccounts($roleName)
    {
        $user=request()->user();
        if(!$user->hasRole('admin'))
        {
            return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
        }
        $users = User::role($roleName)->get();
        return ResponseFormatter::success($users->load('roles'),'Data semua akun '.$roleName.' berhasil didapatkan');
    }
    
}
