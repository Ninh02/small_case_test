<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
//    public function showFormLogin()
//    {
//        return view('admin.login');
//    }
//
//    public function login(Request $request)
//    {
//        $email = $request->email;
//        $password = $request->password;
//        if ($email == 'admin@gmail.com' && $password == '123456'){
//            return redirect()->route('category.index');
//        }else{
//            session()->flash('login_error', 'Account not exits!');
//            return redirect()->route('login.showFormLogin');
//        }
//    }
//
//    public function logout()
//    {
//        return redirect()->route('login.showFormLogin');
//    }
    public function index()
    {
        return view('admin.login');
    }


    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('category.index')
                ->withSuccess('Signed in');
        }

        return redirect()->route('login')->withSuccess('Đăng nhập không hợp lệ');
    }



    public function registration()
    {
        return view('admin.registration');
    }


    public function userRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('login')->withSuccess('Bạn đã đăng kí');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect()->route('login')->withSuccess('Bạn không được phép truy cập');
    }


    public function logOut() {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
