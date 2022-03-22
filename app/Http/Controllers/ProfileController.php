<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function adminProfile()
    {
        
        return view('pages.admin.SuperAdmin-Profile');
    }

    // public function store(Request $request){
    //     $request->validate([
    //         'nama_depan' => 'required',
    //         'nama_belakang' => 'required',
    //         'email' => 'required',
    //         'nomor_hp' => 'required',
    //         'bio' => 'required'
    //     ]);

    //     $input -> $request->all();

    //     $admin = 
    // }

    public function hrdProfile()
    {
        return view('pages.hrd.HR-Profile');
    }

    public function satpamProfile(){
        return view('pages.satpam.Satpam-profile');
    }
}
