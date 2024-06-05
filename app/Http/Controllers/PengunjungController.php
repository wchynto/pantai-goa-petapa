<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengunjungRequest;
use App\Http\Requests\UpdatePengunjungRequest;
use App\Services\GuestService;
use App\Services\PengunjungService;
use App\Services\UserService;

class PengunjungController extends Controller
{
    protected $pengunjungService;
    protected $userService;
    protected $guestService;

    public function __construct()
    {
        $this->pengunjungService = new PengunjungService();
        $this->userService = new UserService();
        $this->guestService = new GuestService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pengunjung = $this->pengunjungService->getPengunjungAll();

            return view('admin.pengunjung', [
                'pengunjung' => $pengunjung,
                'title' => 'Pengunjung - Admin Pantai Goa Petapa'
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.tambah-pengunjung', [
                'title' => 'Tambah Pengunjung - Admin Pantai Goa Petapa'
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengunjungRequest $request)
    {
        try {
            $data = $request->all();

            $pengunjung = $this->pengunjungService->createPengunjung($data);

            $data['pengunjung_uuid'] = $pengunjung->uuid;

            if ($request->tipe == 'user') {
                $this->userService->createUser($data);
            } else {
                $this->guestService->createGuest($data);
            }

            return back()->with('success', 'Data pengunjung berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->with('error',  $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $pengunjung = $this->pengunjungService->getPengunjungByUuid($id);

            return view('', [
                'pengunjung' => $pengunjung,
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengunjungRequest $request, string $id)
    {
        try {
            $data = $request->all();
            if ($this->pengunjungService->isUser($id)) {
                if (!$data['password'])
                    $data['password'] = $this->userService->getUserWhere('pengunjung_uuid', $id)->first()->password;
                $this->userService->getUserWhere('pengunjung_uuid', $id)->first()->update($data);
            } else {
                $this->guestService->getGuestWhere('pengunjung_uuid', $id)->first()->update($data);
            }

            $this->pengunjungService->updatePengunjung($data, $id);

            return back()->with('success', 'Data pengunjung berhasil diubah!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->pengunjungService->deletePengunjung($id);

            return back()->with('success', 'Data pengunjung berhasil dihapus!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Data pengunjung gagal dihapus!');
        }
    }
}
