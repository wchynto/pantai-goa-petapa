<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Services\TransaksiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiTiketController extends Controller
{
    protected $transaksiService;

    public function __construct()
    {
        $this->transaksiService = new TransaksiService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksiTiket = [];

        foreach ($this->transaksiService->getTransaksiAll() as $transaksi) {
            foreach ($transaksi->tiket()->get() as $tiket) {
                array_push($transaksiTiket, $tiket);
            }
        }

        return view('admin.transaksi_tiket.index', [
            'title' => 'Tiket - Admin Pantai Goa Petapa',
            'transaksi_tiket' => $transaksiTiket,
        ]);
    }

    public function verifikasi(Request $request)
    {
        $tiket = DB::table('transaksi_tikets')->where('no_tiket', $request->no_tiket)->first();

        if (!$tiket) {
            return back()->with('error', 'Tiket tidak ditemukan');
        }


        $tiket = DB::table('transaksi_tikets')->where('no_tiket', $request->no_tiket)->update([
            'status' => 'used',
        ]);

        return back()->with('success', 'Tiket berhasil diverifikasi');
    }

    public function scan(Request $request)
    {
        try {
            $tiket = DB::table('transaksi_tikets')->where('no_tiket', $request->no_tiket)->first();

            if (!$tiket) {
                return response()->json([
                    'message' => 'Tiket tidak ditemukan',
                ], 404);
            }

            $tiket = DB::table('transaksi_tikets')->where('no_tiket', $request->no_tiket)->update([
                'status' => 'used',
            ]);

            return response()->json([
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
