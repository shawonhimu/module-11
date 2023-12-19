<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Display a listing of the resource.

    public function index()
    {
        $allData = DB::table('products')->get();
        return view('ProductList', [ 'allProducts' => $allData ]);
    }

    //Show the form for creating a new resource.

    public function create()
    {
        return view('AddProduct');
    }

    //Store a newly created resource in storage.

    public function store(Request $request)
    {
        $name = $request->input('name');
        $details = $request->input('details');
        $imageLink = $request->input('image');
        $discount = $request->input('discount');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $unit = $request->input('unit');
        $isExistName = DB::table('products')->where('name', '=', $name)->first();
        if (!$isExistName) {
            $result = DB::table('products')->insert([
                'name' => $name,
                'details' => $details,
                'image' => $imageLink,
                'discount' => $discount,
                'price' => $price,
                'quantity' => $quantity,
                'unit' => $unit,
             ]);
            if ($result) {

                return redirect('new-product')->with('success', 'Product has added successfully');
            } else {

                return redirect('new-product')->with('error', 'Failed to add product');
            }
        } else {
            return redirect('new-product')->with('error', 'This product already exists ! ');
        }
    }

    //Display the specified resource.

    public function show(string $id)
    {
        $singleData = DB::table('products')->where('id', '=', $id)->get();
        return $singleData;
    }

    //Show the form for editing the specified resource.

    public function edit(string $id)
    {
        $singleData = DB::table('products')->where('id', '=', $id)->get();
        return view('EditProduct', [ 'singleProduct' => $singleData ]);
    }

    //Update the specified resource in storage.

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $details = $request->input('details');
        $imageLink = $request->input('image');
        $discount = $request->input('discount');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $unit = $request->input('unit');
        $result = DB::table('products')->where('id', $id)->update([
            'id' => $id,
            'name' => $name,
            'details' => $details,
            'image' => $imageLink,
            'discount' => $discount,
            'price' => $price,
            'quantity' => $quantity,
            'unit' => $unit,
         ]);
        if ($result) {
            return redirect('product')->with('success', 'Product has updated successfully');
        } else {

            return redirect('product')->with('error', 'Failed to update product');
        }
    }

    //  Remove the specified resource from storage.

    public function destroy(string $id)
    {
        $result = DB::table('products')->where('id', '=', $id)->delete();
        if ($result) {
            return redirect('product')->with('success', 'Product has deleted successfully');
        } else {

            return redirect('product')->with('error', 'Failed to delete product');
        }
    }
}
