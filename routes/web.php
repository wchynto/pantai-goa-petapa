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

Route::get('/login', function () {
  return view('login', ['title' => 'Login - Pantai Goa Petapa']);
});

Route::get('/sign-up', function () {
  return view('sign-up', ['title' => 'Sign Up - Pantai Goa Petapa']);
});

// Admin routes
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');
