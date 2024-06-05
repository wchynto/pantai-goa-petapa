<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\KategoriService;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $kategoriService;

    public function __construct()
    {
        $this->kategoriService = new KategoriService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.kategori.index', [
                'title' => 'Tiket - Admin Goa Petapa',
                'kategori' => $this->kategoriService->getKategoriAll(),
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
            return view('admin.kategori.create', [
                'title' => 'Tambah Tiket - Admin Goa Petapa',
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
            $this->kategoriService->createKategori($request->all());

            return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil ditambahkan!');
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
            return view('admin.kategori.edit', [
                'title' => 'Edit Tiket - Admin Goa Petapa',
                'kategori' => $this->kategoriService->getKategoriByUuid($id),
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->kategoriService->updateKategori($request->all(), $id);

            return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil diupdate!');
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
            $this->kategoriService->deleteKategori($id);

            return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Kategori gagal dihapus!');
        }
    }
}
