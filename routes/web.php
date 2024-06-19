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
use App\Http\Controllers\TransaksiOnlineController;

// User routes
Route::get('/', function () {
    return view('home', ['title' => 'Home - Pantai Goa Petapa']);
});

Route::get('tiket', [TiketController::class, 'displayTiket'])->name(('home.tiket'));
Route::post('/add-item', [TransaksiOnlineController::class, 'addItem'])->name('add-item');

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
});

Route::get('blog', function () {
    return view('blog', ['title' => 'Blog - Pantai Goa Petapa']);
});

Route::get('detail-blog', function () {
    return view('detail-blog', ['title' => 'Detail Blog - Pantai Goa Petapa']);
});

Route::get('login', [UserSessionController::class, 'viewLogin'])->name('login');

Route::get('register', [UserSessionController::class, 'viewRegister'])->name('register');

Route::group([
    'prefix' => 'user/{id}/',
    'as' => 'user.',
    'middleware' => ['user'],
], function () {
    Route::get('/', [UserSessionController::class, 'profil'])->name('profil');
    Route::get('riwayat-pemesanan', [HistoryOrderController::class, 'index'])->name('history-order');
    Route::get('riwayat-pemesanan/{transaksiId}', [HistoryOrderController::class, 'show'])->name('history-order.show');
    Route::get('transaksi', [TransaksiOnlineController::class, 'showTransaksi'])->name('order');
    Route::get('konfirmasi-pembayaran', [TransaksiOnlineController::class, 'showKonfirmasiTransaksi'])->name('confirmation-order');
    Route::get('pembayaran', [TransaksiOnlineController::class, 'showPembayaran'])->name('payment');
});

// Admin routes
Route::get('admin/login', [AdminSessionController::class, 'viewLogin'])->name('admin.viewLogin');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function () {
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('tiket', TiketController::class);
    Route::resource('pengunjung', PengunjungController::class);

    Route::resource('postingan', PostinganController::class);

    Route::resource('kategori', KategoriController::class);

    Route::get('laporan', function () {
        return view('/admin/laporan', ['title' => 'Laporan - Admin Pantai Goa Petapa']);
    });
});

// Auth User
Route::post('user/login', [UserSessionController::class, 'login'])->name('user.login');
Route::get('user/logout', function () {
})->name('user.logout');

// Auth Admin
Route::post('admin/login', [AdminSessionController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminSessionController::class, 'logout'])->name('admin.logout');
