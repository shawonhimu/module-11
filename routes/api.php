<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Product
Route::get('/product', [ ProductController::class, 'index' ]);
