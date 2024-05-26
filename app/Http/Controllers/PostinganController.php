<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostinganRequest;
use App\Http\Requests\UpdatePostinganRequest;
use App\Services\PostinganService;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    protected $postinganService;

    public function __construct()
    {
        $this->postinganService = new PostinganService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('', [
                'title' => '',
                'postingan' => $this->postinganService->getPostinganAll(),
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
    public function store(StorePostinganRequest $request)
    {
        try {
            $this->postinganService->createPostingan($request->all());

            return back()->with('success', 'Data Postingan berhasil ditambahkan!');
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
                'postingan' => $this->postinganService->getPostinganByUuid($id),
            ]);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostinganRequest $request, string $id)
    {
        try {
            $this->postinganService->updatePostingan($request->all(), $id);

            return back()->with('success', 'Data Postingan berhasil diubah!');
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
            $this->postinganService->deletePostingan($id);

            return back()->with('success', 'Data Postingan berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Postingan gagal dihapus!');
        }
    }
}
