<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home - Pantai Goa Petapa']);
});

Route::get('/tiket', function () {
    return view('tiket', ['title' => 'Tiket - Pantai Goa Petapa']);
});

Route::get('/tentang', function () {
    return view('tentang', ['title' => 'Tentang - Pantai Goa Petapa']);
});

Route::get('/kontak', function () {
    return view('kontak', ['title' => 'Kontak - Pantai Goa Petapa']);
});

Route::get('/login', [UserSessionController::class, 'viewLogin']);

Route::get('/register', [UserSessionController::class, 'viewRegister']);

// Admin routes
Route::get('/admin/dashboard', DashboardController::class);

Route::get('/admin/penjualan', function () {
    return view('/admin/penjualan', ['title' => 'Penjualan Admin - Pantai Goa Petapa']);
});
