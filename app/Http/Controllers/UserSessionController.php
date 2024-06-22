<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\LoginRequest;
use App\Services\PengunjungService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;

class UserSessionController extends Controller
{
  protected $userService;
  protected $pengunjungService;

  public function __construct()
  {
    $this->userService = new UserService();
    $this->pengunjungService = new PengunjungService();
  }

  public function viewLogin()
  {
    try {
      return view('login', ['title' => 'Login - Pantai Goa Petapa']);
    } catch (\Exception $e) {
      abort(500);
    }
  }

  public function viewRegister()
  {
    try {
      return view('register', ['title' => 'Register - Pantai Goa Petapa']);
    } catch (\Exception $e) {
      abort(500);
    }
  }

  public function profil($id)
  {
    try {
      return view('user/profil', [
        'user' => $this->userService->getUserByUuid($id),
        'title' => 'Profil - Pantai Goa Petapa'
      ]);
    } catch (\Exception $e) {
      abort(500);
    }
  }

  public function updateProfil(UpdateProfileRequest $request, String $id)
  {
    try {
      $data = $request->all();
      $user_id = $this->userService->getUserWhere('pengunjung_uuid', $id)->first()->uuid;

      if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $fotoName = time() . '.' . Str::lower(str_replace(' ', '', $data['nama'])) . '.' . $foto->getClientOriginalExtension();
        $path = Storage::putFileAs('public/images/users', $foto, $fotoName);
        $data['foto'] = $path;

        $foto = $this->userService->getUserByUuid($user_id)->foto;
        if ($foto) {
          Storage::delete($foto);
        }
      }

      $this->userService->updateUser($data, $user_id);
      $this->pengunjungService->updatePengunjung($data, $id);
      return redirect()->route('user.profil', $user_id)->with('success', 'Profil berhasil diperbarui!');
    } catch (\Exception $e) {
      return back()->with('error', $e->getMessage());
    }
  }

  public function login(LoginRequest $request)
  {
    try {
      $credentials = $request->only('email', 'password');

      if (auth()->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/');
      }

      return redirect()->route('login')->with('error', 'Email atau password salah!')->with($request->only('email'));
    } catch (\Exception $e) {
      return back()->with('error', $e->getMessage())->with($request->only('email'));
    }
  }

  public function logout(Request $request)
  {
    try {
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('');
    } catch (\Exception $e) {
      return back()->with('error', $e->getMessage());
    }
  }
}
