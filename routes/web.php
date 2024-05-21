<?php

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

// Admin routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
