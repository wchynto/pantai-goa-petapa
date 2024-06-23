<?php

use App\Http\Controllers\TransaksiTiketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('transaksi-tiket/scan', [TransaksiTiketController::class, 'scan'])->name('transaksi-tiket.scan');
