<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryOrderController extends Controller
{
  public function index()
  {
    try {
      return view('user/riwayat-pemesanan', [
        'title' => 'Riwayat Pemesanan - Pantai Goa Petapa',
        'riwayat' => auth()->user()->pengunjung->transaksi,
      ]);
    } catch (\Exception $e) {
      abort(500);
    }
  }

  public function show($id)
  {
    try {
      $transaksi = auth()->user()->pengunjung->transaksi->find($id);

      if ($transaksi) {
        return view('user/detail-riwayat-pemesanan', [
          'title' => 'Detail Riwayat Pemesanan - Pantai Goa Petapa',
          'transaksi' => $transaksi,
        ]);
      } else {
        return redirect()->route('history-order')->with('error', 'Transaksi tidak ditemukan!');
      }
    } catch (\Exception $e) {
      abort(500);
    }
  }
}
