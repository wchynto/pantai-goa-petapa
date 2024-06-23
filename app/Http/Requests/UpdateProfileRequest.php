<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
      'email' => 'required|email',
      'no_telepon' => 'required',
      'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'nama.required' => 'Nama harus diisi',
      'email.required' => 'Email harus diisi',
      'email.email' => 'Email harus valid',
      'no_telepon.required' => 'Nomor telepon harus diisi',
      'foto.image' => 'Foto harus berupa gambar',
      'foto.mimes' => 'Foto harus berupa gambar dengan format jpeg, png, atau jpg',
      'foto.max' => 'Ukuran foto maksimal 2MB'
    ];
  }
}
