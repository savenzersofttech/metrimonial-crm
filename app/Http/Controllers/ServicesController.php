<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function dashboard()
    {
        return view('services.dashboard');
    }
}
