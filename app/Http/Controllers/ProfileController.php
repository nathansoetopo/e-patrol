<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function adminProfile()
    {
        return view('pages.admin.SuperAdmin-Profile');
    }

    public function hrdProfile()
    {
        return view('pages.hrd.HR-Profile');
    }

    public function satpamProfile(){
        return view('pages.satpam.Satpam-profile');
    }
}
