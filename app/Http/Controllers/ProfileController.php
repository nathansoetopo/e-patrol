<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $user = request()->user();
        if (!$user->hasRole('satpam')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'min:12',
            'bio' => 'string',
            'image' => 'max:10240|mimes:jpg,png,jpeg',
        ]);
        if ($validator->fails()) {
            // return ResponseFormatter::error($validator, $validator->messages(), 400);
            return redirect()->back()->withInput()->withError($validator);
        }

        if(request()->hasFile('image'))
        {
            $image = time()."_".request()->image->getClientOriginalName();
            request()->image->move(public_path('data_users/'.$user->name.'/image'), $image); 
        }

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'bio' => request('bio'),
            'image' => $image,
        ]);
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
