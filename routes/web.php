<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware([ 'CheckLogin' ])->group(function () {

//Product
    Route::get('/product', [ ProductController::class, 'index' ]);
    Route::get('/new-product', [ ProductController::class, 'create' ]);
    Route::post('/add-product', [ ProductController::class, 'store' ]);
    Route::get('/product-details/{id}', [ ProductController::class, 'show' ]);
    Route::get('/edit-product/{id}', [ ProductController::class, 'edit' ]);
    Route::post('/update-product', [ ProductController::class, 'update' ]);
    Route::get('/delete-product/{id}', [ ProductController::class, 'destroy' ]);

//Transactions
    Route::get('/', [ TransactionController::class, 'HomeCards' ])->middleware('CheckLogin');
    Route::get('/transactions', [ TransactionController::class, 'index' ]);
    Route::post('/sell', [ TransactionController::class, 'store' ]);
    Route::get('/transaction-details/{id}', [ TransactionController::class, 'show' ]);
    Route::get('/make-transaction', [ TransactionController::class, 'create' ]);

//Customers
    Route::get('/customer', [ CustomerController::class, 'index' ]);
    Route::post('/add-customer', [ CustomerController::class, 'store' ]);

// Login

    Route::get('/logout', [ LoginController::class, 'onLogout' ]);

//404 Not found page

    Route::fallback([ NotFoundController::class, 'show' ]);

});

//Login
Route::get('/login', [ LoginController::class, 'Login' ]);
Route::post('/login', [ LoginController::class, 'onLogin' ]);

//Registration

Route::get('/registration', [ LoginController::class, 'registrationForm' ]);
Route::post('/registration', [ LoginController::class, 'registration' ]);
