<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 2, // muc do binh thuong
        ];

        $remember = $request->remember ?? false;

        if (Auth::attempt($credentials, $remember))
            return redirect('');
        else
            return back()->with('notification',"ERROR: Email or password wrong.");
    }

    public function logout(){
        Auth::logout();
        return back();
    }
}
