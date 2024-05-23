<?php

namespace App\Http\Controllers;

use App\Services\TransaksiService;
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
            return view('', [
                'title' => '',
                'transaksi' => $this->transaksiService->getTransaksiAll(),
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('', [
                'title' => '',
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
