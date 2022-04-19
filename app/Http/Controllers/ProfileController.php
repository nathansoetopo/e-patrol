<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('pages.admin.SuperAdmin-Profile', compact('data'));
    }

    public function adminUpdate($id, Request $request){
        $update = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'bio' => $request->bio
        ]);
        return redirect()->back()->with('success','Success Update');
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
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('pages.hrd.HR-Profile', compact('data'));
    }

    public function satpamProfile()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('pages.satpam.Satpam-profile', compact('data'));
    }

    public function StoreProfileSatpam(Request $request)
    {
        $user = Auth::user()->id;
        $find = User::find($user);
        $find->update($request->except(['image']));
        //Tambahin Validator
        return redirect('satpam/profile');
    }

    public function StoreProfileHrd(Request $request)
    {
        $user = Auth::user()->id;
        $find = User::find($user);
        $find->update($request->except(['image']));
        return redirect('hrd/profile'); 
        // dd($request);
    }
}
