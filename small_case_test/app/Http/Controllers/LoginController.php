<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if ($email == 'admin@gmail.com' && $password == '123456'){
            return redirect()->route('category.index');
        }else{
            session()->flash('login_error', 'Account not exits!');
            return redirect()->route('login.showFormLogin');
        }
    }
}
