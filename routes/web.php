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
use App\Http\Controllers\TransaksiTiketController;

// User routes
Route::get('/', function () {
    return view('home', ['title' => 'Home - Pantai Goa Petapa']);
});

Route::get('tiket', [TiketController::class, 'displayTiket'])->name(('home.tiket'));
Route::post('/add-item', [TransaksiOnlineController::class, 'addItem'])->name('add-item');
Route::post('/proses-pembayaran', [TransaksiOnlineController::class, 'prosesPembayaran'])->name('proses-pembayaran');

Route::get('tentang', function () {
    return view('tentang', ['title' => 'Tentang - Pantai Goa Petapa']);
});

Route::get('kontak', function () {
    return view('kontak', ['title' => 'Kontak - Pantai Goa Petapa']);
});

Route::get('blog', function () {
    return view('blog', ['title' => 'Blog - Pantai Goa Petapa']);
});

Route::get('blog/{id}', function () {
    return view('detail-blog', ['title' => 'Detail Blog - Pantai Goa Petapa']);
});

Route::get('login', [UserSessionController::class, 'viewLogin'])->name('login');

Route::get('register', [UserSessionController::class, 'viewRegister'])->name('register');

Route::get('tiket/demo', function () {
    return view('pdf.tiket');
});

Route::group([
    'prefix' => 'user/{id}/',
    'as' => 'user.',
    'middleware' => ['user'],
], function () {
    Route::get('profil', [UserSessionController::class, 'profil'])->name('profil');
    Route::post('profil-update', [UserSessionController::class, 'updateProfil'])->name('profil.update');
    Route::get('riwayat-pemesanan', [HistoryOrderController::class, 'index'])->name('history-order');
    Route::get('riwayat-pemesanan/{transaksiId}', [HistoryOrderController::class, 'show'])->name('history-order.show');
    Route::get('transaksi', [TransaksiOnlineController::class, 'showTransaksi'])->name('order');
    Route::get('transaksi/{transaksiUuid}', [TransaksiOnlineController::class, 'showPembayaran'])->name('payment');
    Route::get('transaksi/{transaksiUuid}/sukses', [TransaksiOnlineController::class, 'transaksiSukses'])->name('payment-success');
    Route::get('transaksi/{transaksiUuid}/gagal', [TransaksiOnlineController::class, 'transaksiGagal'])->name('payment-failed');
    Route::get('transaksi/{transaksiUuid}/print-tiket', [TransaksiOnlineController::class, 'printTiket'])->name('print-tiket');
});

// Admin routes
Route::get('admin/login', [AdminSessionController::class, 'viewLogin'])->name('admin.viewLogin');
Route::post('pengunjung', [PengunjungController::class, 'store'])->name('pengunjung.store');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function () {
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('transaksi-tiket', TransaksiTiketController::class);
    Route::post('transaksi-tiket/verifikasi', [TransaksiTiketController::class, 'verifikasi'])->name('transaksi-tiket.verifikasi');
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('tiket', TiketController::class);
    Route::resource('pengunjung', PengunjungController::class)->except(['store']);
    Route::post('pengunjung-guest', [PengunjungController::class, 'storeGuest'])->name('storeGuest');
    Route::resource('kategori', KategoriController::class);
    Route::resource('postingan', PostinganController::class);

    Route::get('laporan', function () {
        return view('/admin/laporan', ['title' => 'Laporan - Admin Pantai Goa Petapa']);
    })->name('admin.laporan');
});

// Auth User
Route::post('user/login', [UserSessionController::class, 'login'])->name('user.login');
Route::get('user/logout', [UserSessionController::class, 'logout'])->name('user.logout');

// Auth Admin
Route::post('admin/login', [AdminSessionController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminSessionController::class, 'logout'])->name('admin.logout');
