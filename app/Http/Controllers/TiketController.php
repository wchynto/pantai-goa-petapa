<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTiketRequest;
use App\Http\Requests\UpdateTiketRequest;
use App\Services\TiketService;

class TiketController extends Controller
{
    protected $tiketService;

    public function __construct()
    {
        $this->tiketService = new TiketService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('', [
                'title' => '',
                'tiket' => $this->tiketService->getTiketAll(),
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
    public function store(StoreTiketRequest $request)
    {
        try {
            $this->tiketService->createTiket($request->all());

            return back()->with('success', 'Data Tiket berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
        try {
            return view('', [
                'title' => '',
                'tiket' => $this->tiketService->getTiketByUuid($id),
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTiketRequest $request, string $id)
    {
        try {
            $this->tiketService->updateTiket($request->all(), $id);

            return back()->with('success', 'Data Tiket berhasil diubah!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->tiketService->deleteTiket($id);

            return back()->with('success', 'Data Tiket berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Tiket gagal dihapus!');
        }
    }
}
