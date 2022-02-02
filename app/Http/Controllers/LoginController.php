<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email'=>'required|email',
            'password' => 'min:8|required',
        ]);
        if($validator->fails()){
            return redirect('login')->withInput()->withErrors($validator);
        }
        $user=User::where('email',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                if($user->hasRole('admin'))
                {
                    Auth::login($user);
                    return redirect('/admin');
                }
                elseif($user->hasRole('hrd'))
                {
                    Auth::login($user);
                    return redirect('/hrd');
                }
                elseif($user->hasRole('satpam'))
                {
                    Auth::login($user);
                    return redirect('/satpam');
                }
            }
            return redirect('/')->with('status','Password anda salah');
        }
        return redirect('/')->with('status','Email anda salah');
    }

    public function logout()
    {
        Auth::logout(request()->user());
        return redirect('/');
    }
}
