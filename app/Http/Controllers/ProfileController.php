<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('pages.hrd.HR-Profile', compact('data'));
    }

    public function satpamProfile(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('pages.satpam.Satpam-profile', compact('data'));
    }

    public function StoreProfileSatpam(Request $request){
        $user = Auth::user()->id;
        $find = User::find($user);
        $find->update($request->except(['image']));
        //Tambahin Validator
        return redirect('satpam/profile');
    }

    public function StoreProfileHrd(Request $request){
        /* $user = request()->user();
        $user->update($request->except(['image']));
        //Tambahin Validator
        return redirect('hrd/profile'); */
        dd($request);
    }
}
