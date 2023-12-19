<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCustomers = DB::table('customers')->get();
        return view('Customer', [ 'customers' => $allCustomers ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customerName = $request->input('customerName');
        $customerPhone = $request->input('customerPhone');
        $isExistPhone = DB::table('customers')->where('customer_phone', '=', $customerPhone)->first();
        if (!$isExistPhone) {
            $result = DB::table('customers')->insert([
                'customer_name' => $customerName,
                'customer_phone' => $customerPhone,
             ]);
            if ($result) {
                return redirect('make-transaction')->with('success', 'Customer has added successfully');
            } else {
                return redirect('make-transaction')->with('error', 'Failed to add customer');
            }
        } else {
            return redirect('make-transaction')->with('error', 'This phone number/person already exists ! ');
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
