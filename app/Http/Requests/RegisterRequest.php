<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'nama' => 'required',
      'email' => 'required|email|unique:users,email',
      'no_telepon' => 'required',
      'password' => 'required|min:8',
      'konfirmasi_password' => 'required|same:password'
    ];
  }

  /**
   * Get the validation messages that apply to the request.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'nama.required' => 'Nama harus diisi',
      'email.required' => 'Email harus diisi',
      'email.email' => 'Email harus valid',
      'email.unique' => 'Email sudah terdaftar',
      'no_telepon.required' => 'Nomor telepon harus diisi',
      'password.required' => 'Password harus diisi',
      'password.min' => 'Password minimal 8 karakter',
      'konfirmasi_password.required' => 'Konfirmasi password harus diisi',
      'konfirmasi_password.same' => 'Konfirmasi password harus sama dengan password'
    ];
  }
}
