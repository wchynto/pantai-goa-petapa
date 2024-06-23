<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\GuestService;
use App\Services\PengunjungService;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
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

  public function index()
  {
    try {
      $member = $this->userService->getUserAll();
      $totalMember = [
        'all' => $member->count(),
        'last7day' => $member->where('created_at', '>=', now()->subDays(7)->format('Y-m-d'))->count(),
        'last30day' => $member->where('created_at', '>=', now()->subDays(30)->format('Y-m-d'))->count(),
      ];

      $guest = $this->guestService->getGuestAll();
      $totalGuest = [
        'all' => $guest->count(),
        'last7day' => $guest->where('created_at', '>=', now()->subDays(7)->format('Y-m-d'))->count(),
        'last30day' => $guest->where('created_at', '>=', now()->subDays(30)->format('Y-m-d'))->count(),
      ];

      return view('admin.laporan', [
        'title' => 'Laporan - Admin Pantai Goa Petapa',
        'totalMember' => $totalMember,
        'totalGuest' => $totalGuest,
      ]);
    } catch (\Exception $e) {
      abort(500);
    }
  }
}
