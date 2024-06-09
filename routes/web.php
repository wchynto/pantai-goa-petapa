<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\UserSessionController;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\TiketController;

// User routes
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

Route::get('/order', function () {
    return view('order', ['title' => 'Order - Pantai Goa Petapa']);
});

Route::get('/confirmation-order', function () {
    return view('confirmation-order', ['title' => 'Confirmation Order - Pantai Goa Petapa']);
});

Route::get('/payment', function () {
    return view('payment', ['title' => 'Payment - Pantai Goa Petapa']);
});

// Admin routes
Route::get('admin/login', [AdminSessionController::class, 'viewLogin']);

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function () {
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('tiket', TiketController::class);
    Route::resource('pengunjung', PengunjungController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('postingan', PostinganController::class);

    Route::get('laporan', function () {
        return view('/admin/laporan', ['title' => 'Laporan - Admin Pantai Goa Petapa']);
    });
});

// Auth User
Route::post('user/login', [UserSessionController::class, 'login'])->name('user.login');
Route::get('user/logout', [UserSessionController::class, 'logout'])->name('user.logout');

// Auth Admin
Route::post('admin/login', [AdminSessionController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminSessionController::class, 'logout'])->name('admin.logout');
