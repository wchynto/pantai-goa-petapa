<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KategoriService;
use App\Services\PostinganService;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $postinganService;
    protected $kategoriService;

    public function __construct()
    {
        $this->postinganService = new PostinganService();
        $this->kategoriService = new KategoriService();
    }

    public function index()
    {
        try {
            $blogs = $this->postinganService->getPostinganAll();
            $recentBlogs = collect($blogs)->sortByDesc('created_at')->take(5);
            $allkategori = $this->kategoriService->getKategoriAll();

            return view('blog', [
                'title' => 'Blog - Pantai Goa Petapa',
                'blogs' => $blogs,
                'recentBlogs' => $recentBlogs,
                'kategori' => $this->kategoriService->getKategoriAll(),
                'allkategori' => $allkategori
            ]);
        } catch (\Exception $e) {
            //   abort(500);
            throw $e;
        }
    }
}
