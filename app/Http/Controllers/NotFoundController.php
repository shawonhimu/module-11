<?php

namespace App\Http\Controllers;

class NotFoundController extends Controller
{
    public function show()
    {
        return view('errors.404');
    }
}
