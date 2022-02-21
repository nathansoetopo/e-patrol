<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ResponseFormatter;

class LoginController extends Controller
{
    /* public function index()
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
    } */

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'min:8|required',
        ]);
        if ($validator->fails()) {
            return ResponseFormatter::error($validator, $validator->messages(), 400);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                $token = $user->createToken('authToken')->plainTextToken;
                $data = [
                    'user' => $user->load('roles'),
                    'Token Type' => 'Bearer Token',
                    'Token' => $token,
                ];
                return ResponseFormatter::success($data, 'Login sukses');
            }
            return ResponseFormatter::error(null, 'Password anda salah', 417);
        }
        return ResponseFormatter::error(null, 'Email anda salah', 417);
    }

    public function logout()
    {
        $token = request()->user()->currentAccessToken()->delete();

        return ResponseFormatter::success(
            $token,
            'Token Revoked'
        );
    }
}
