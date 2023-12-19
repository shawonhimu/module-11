<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // ====== show login form =========== //
    public function Login(Request $request)
    {
        if (($request->session()->has('username')) && ($request->session()->has('password'))) {
            return redirect('/');
        } else {
            return view('Login');
        }

    }

    //============= logout ===========//
    public function onLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }

    // ============= Login Process ===============//
    public function onLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $userConfirm = DB::table('shopkeepers')->where('username', '=', $username)->where('password', '=', $password)->count();

        if ($userConfirm == 1) {
            $request->session()->put('username', $username);
            $request->session()->put('password', $password);
            return redirect('/')->with('success', 'Successfully login !');

        } else {
            return redirect('/login')->with('error', 'Wrong username or password');
        }

    }

    //================= Registrtion  form  ===============//

    public function registrationForm(Request $request)
    {
        if (($request->session()->has('username')) && ($request->session()->has('password'))) {
            return redirect('/');
        } else {
            return view('Register');
        }
    }

    //================= Registrtion ===============//

    public function registration(Request $request)
    {
        $keeperName = $request->input('keeperName');
        $username = $request->input('username');
        $designation = $request->input('designation');
        $keeperPhone = $request->input('keeperPhone');
        $email = $request->input('email');
        $address = $request->input('address');
        $password = $request->input('password');
        $conFirmPassword = $request->input('conFirmPassword');
        $isUsername = DB::table('shopkeepers')->where('username', '=', $username)->first();
        $isKeeperPhone = DB::table('shopkeepers')->where('keeper_phone', '=', $keeperPhone)->first();
        if ($conFirmPassword != $password) {
            return redirect('registration')->with('error', "Password doesn't match. Try again !");
        } else {
            if ((!$isUsername & !$isKeeperPhone)) {
                $result = DB::table('shopkeepers')->insert([
                    'keeper_name' => $keeperName,
                    'username' => $username,
                    'designation' => $designation,
                    'keeper_phone' => $keeperPhone,
                    'email' => $email,
                    'address' => $address,
                    'password' => $password,
                 ]);
                if ($result) {
                    return redirect('login')->with('success', 'Registration successful ! Please Login.');
                } else {
                    return redirect('registration')->with('error', 'Failed to register !');
                }
            } else {
                return redirect('registration')->with('error', 'Username or phone number has already used ! Please try again or go to login page ');
            }
        }
    }

}
