<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\UserSessionController;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\HistoryOrderController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\TiketController;

// User routes
Route::get('/', function () {
    return view('home', ['title' => 'Home - Pantai Goa Petapa']);
});

Route::get('tiket', [TiketController::class, 'displayTiket']);

Route::get('tentang', function () {
    return view('tentang', ['title' => 'Tentang - Pantai Goa Petapa']);
});

Route::get('kontak', function () {
    return view('kontak', ['title' => 'Kontak - Pantai Goa Petapa']);
});

Route::get('posting-user', function () {
    return view('posting-user', ['title' => 'Postingan User - Pantai Goa Petapa']);
});

Route::get('detail-posting', function () {
    return view('detail-posting', ['title' => 'Detail Posting - Pantai Goa Petapa']);
  
Route::get('blog', function () {
  return view('blog', ['title' => 'Blog - Pantai Goa Petapa']);
});

Route::get('detail-blog', function () {
  return view('detail-blog', ['title' => 'Detail Blog - Pantai Goa Petapa']);
});

Route::get('login', [UserSessionController::class, 'viewLogin'])->name('login');

Route::get('register', [UserSessionController::class, 'viewRegister'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('order', function () {
        return view('order', ['title' => 'Order - Pantai Goa Petapa']);
    });

    Route::get('confirmation-order', function () {
        return view('confirmation-order', ['title' => 'Confirmation Order - Pantai Goa Petapa']);
    });

    Route::get('payment', function () {
        return view('payment', ['title' => 'Payment - Pantai Goa Petapa']);
    });

    Route::get('profil', function () {
        return view('user/profil', ['title' => 'Profil - Pantai Goa Petapa']);
    });

    Route::get('riwayat-pemesanan', [HistoryOrderController::class, 'index'])->name('history-order');

    Route::get('riwayat-pemesanan/{id}', [HistoryOrderController::class, 'show'])->name('history-order.show');
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
