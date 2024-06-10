<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TransaksiOnlineController extends Controller
{
    public function __construct()
    {
    }

    public function showTransaksi()
    {
        return view('order', ['title' => 'Transaksi - Pantai Goa Petapa']);
    }

    public function showKonfirmasiTransaksi()
    {
        return view('confirmation-order', ['title' => 'Konfirmasi Transaksi - Pantai Goa Petapa']);
    }

    public function showPembayaran()
    {
        return view('payment', ['title' => 'Pembayaran - Pantai Goa Petapa']);
    }

    public function prosesPembayaran(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = '<your server key>';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
}
