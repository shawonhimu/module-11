<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopkeeperController extends Controller
{
    //  * Display a listing of the resource.

    public function index()
    {
        $allData = DB::table('shopkeepers')->get();
        return $allData;
    }

    //Show the form for creating a new resource.
    public function create()
    {
        //
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $keeperName = $request->input('keeperName');
        $username = $request->input('username');
        $designation = $request->input('designation');
        $keeperPhone = $request->input('keeperPhone');
        $email = $request->input('email');
        $address = $request->input('address');
        $password = $request->input('password');
        $isUsername = DB::table('shopkeepers')->where('username', '=', $username)->first();
        $isKeeperPhone = DB::table('shopkeepers')->where('keeper_phone', '=', $keeperPhone)->first();
        if (!$isUsername || !$isKeeperPhone) {
            $result = DB::table('products')->insert([
                'keeperName' => $keeperName,
                'username' => $username,
                'designation' => $designation,
                'keeperPhone' => $keeperPhone,
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
            return redirect('login')->with('error', 'You are already registered ! Please login. ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
