<?php

namespace App\Http\Controllers;

use App\Services\TransaksiService;
use ErrorException;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
        try {
            $transaksis = $this->transaksiService->getTransaksiAll();

            return view('admin.transaksi.index', [
                'title' => 'Transaksi - Admin Pantai Goa Petapa',
                'transaksi' => collectionPaginate($transaksis, 10, null, ['path' => route('transaksi.index')]),
            ]);
        } catch (\Exception $e) {
            // abort(500);
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.transaksi.create', [
                'title' => 'Tambah Transaksi - Admin Pantai Goa Petapa',
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        } catch (\Exception $e) {
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return view('admin.transaksi.show', [
                'title' => 'Detail Transaksi - Admin Pantai Goa Petapa',
                'transaksi' => $this->transaksiService->getTransaksiByUuid($id),
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
