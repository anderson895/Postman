<?php
// routes/web.php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return redirect()->route('posts.app');
// });

Route::get('/', function () {
    return view('layouts.app'); // Directly return the layout as the landing page
});

// Authentication routes
require __DIR__.'/auth.php';

