<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home - Pantai Goa Petapa']);
});

Route::get('/ticket', function () {
    return view('ticket', ['title' => 'Ticket - Pantai Goa Petapa']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About - Pantai Goa Petapa']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact - Pantai Goa Petapa']);
});

Route::get('/login', [UserSessionController::class, 'viewLogin']);

Route::get('/sign-up', [UserSessionController::class, 'viewRegister']);

// Admin routes
Route::get('/admin/dashboard', DashboardController::class);

Route::get('/admin/sales', function () {
    return view('/admin/sales', ['title' => 'Sales Admin - Pantai Goa Petapa']);
});
