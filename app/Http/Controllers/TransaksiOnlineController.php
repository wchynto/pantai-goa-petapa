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

    public function addItem(Request $request)
    {
        try {
            $cart = [];
            $canAdd = true;

            if ($request->jumlah == 0) {
                return back()->with('error', 'Minimal jumlah item adalah satu');
            }

            if (session()->has('cart')) {
                $cart = session()->get('cart');
            }

            foreach ($cart as $index => $c) {
                if ($c['uuid'] == $request->uuid) {
                    $cart[$index]['jumlah'] = $request->jumlah;
                    $canAdd = false;
                }
            }

            if ($canAdd) {
                $cart[] = [
                    'uuid' => $request->uuid,
                    'jumlah' => $request->jumlah,
                    'keterangan' => $request->keterangan,
                    'harga' => $request->harga,
                ];
            }

            session(['cart' => $cart]);

            return back()->with('success', 'Item berhasil ditambahkan ke keranjang');
        } catch (\Exception $e) {
            throw $e;
        }
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
