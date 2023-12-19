<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function HomeCards()
    {

        $now = Carbon::now();
        //Expected Date or days
        $todayDate = $now->toDateString();
        $yesterday = $now->subDay()->toDateString();
        $currentMonth = $now->format('m');
        $currentYear = $now->format('Y');
        $lastMonth = $now->subMonth()->format('m');

        //Day month name
        $todayName = $now->today()->format('l');
        $yesterdayName = $now->yesterday()->format('l');
        $currentMonthName = $now->month()->format('F');
        $lastMonthName = $now->subMonth()->format('F');

        // datewise data retrive

        $todayData = DB::table('transactions')
            ->whereDate('created_at', $todayDate)
            ->sum('total_price');
        $yesterdayData = DB::table('transactions')
            ->whereDate('created_at', $yesterday)
            ->sum('total_price');
        $currentMonthData = DB::table('transactions')
            ->whereYear('created_at', $currentYear) // As we need current year running month
            ->whereMonth('created_at', $currentMonth)
            ->sum('total_price');
        $lastMonthData = DB::table('transactions')
            ->whereYear('created_at', $currentYear) // As we need current year last month data
            ->whereMonth('created_at', $lastMonth)
            ->sum('total_price');
        return view('HomeCard', [
            //sumation of expected price
            'todayData' => $todayData,
            'yesterdayData' => $yesterdayData,
            'currentMonthData' => $currentMonthData,
            'lastMonthData' => $lastMonthData,
            //Date
            'todayName' => $todayName,
            'yesterdayName' => $yesterdayName,
            'currentMonthName' => $currentMonthName,
            'lastMonthName' => $lastMonthName,

         ]);
    }
    public function index()
    {
        $allData = DB::table('transactions')
            ->join('products', 'transactions.product_id', '=', 'products.id')
            ->select('transactions.id', 'products.name', 'products.unit', 'transactions.total_price', 'transactions.sell_quantity', 'transactions.created_at')
            ->orderBy('transactions.id', 'desc')
            ->get();
        return view('Transaction', [ 'transactions' => $allData ]);
    }

    // Show the form for creating a new resource.

    public function create()
    {
        $products = DB::table('products')->select('name', 'price', 'unit', 'id')->get();
        $customers = DB::table('customers')->select('customer_name', 'id')->get();
        return view('MakeTransaction', [ 'products' => $products, 'customers' => $customers ]);
    }

    //Store a newly created resource in storage.

    public function store(Request $request)
    {
        $productID = $request->input('productID');
        $customerID = $request->input('customerID');
        //store onwer or seller id
        $keeperUname = $request->session()->get('username');
        $shopkeeperID = DB::table('shopkeepers')->where('username', '=', $keeperUname)->value('id');
        // end store onwer or seller id
        $sellQuantity = $request->input('sellQuantity');
        $totalPrice = $request->input('totalPrice');
        //get existing quantity and verify
        $existingQuantity = DB::table('products')->where('id', '=', $productID)->value('quantity');
        //now make a transaction
        if ($existingQuantity >= $sellQuantity) {
            $result = DB::table('transactions')->insert([
                'product_id' => $productID,
                'customer_id' => $customerID,
                'shopkeeper_id' => $shopkeeperID,
                'sell_quantity' => $sellQuantity,
                'total_price' => $totalPrice,
             ]);
            if ($result) {
                // decrease the existing quantity
                DB::table('products')->where('id', '=', $productID)->decrement('quantity', $sellQuantity);
                //success message and redirect to lastest details

                $lastestDetails = DB::table('transactions')->latest()->value('id');
                return redirect('transaction-details/' . $lastestDetails)->with('success', 'Transaction has made successfully');
            } else {
                return redirect('make-transaction')->with('error', 'Failed to make transaction');
            }
        } else {
            return "Your stock is limited, please try again";
        }

    }

    //Display the specified resource.

    public function show(string $id)
    {
        $isID = DB::table('transactions')->find($id);
        if ($isID) {
            $singleData = DB::table('transactions')
                ->where('transactions.id', '=', $id)
                ->join('products', 'transactions.product_id', '=', 'products.id')
                ->join('customers', 'transactions.customer_id', '=', 'customers.id')
                ->join('shopkeepers', 'transactions.shopkeeper_id', '=', 'shopkeepers.id')
                ->get();
            return view('TransactionDetails', [ 'singleTransaction' => $singleData ]);
        } else {
            return redirect('transaction-details/');
        }
    }

    //Show the form for editing the specified resource.

    public function edit(string $id)
    {
        //
    }

    //Update the specified resource in storage.

    public function update(Request $request, string $id)
    {
        //
    }

    //Remove the specified resource from storage.

    public function destroy(string $id)
    {
        // return $result;

    }
}
