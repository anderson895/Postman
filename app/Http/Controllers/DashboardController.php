<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Make sure you have a dashboard.blade.php in resources/views
    }
}
