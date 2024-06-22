<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTiketRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    if (auth()->guard('web-admin')->check()) {
      return true;
    }

    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'keterangan' => 'required',
      'harga' => 'required|numeric',
      'jenis_kendaraan' => 'required',
      'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ];
  }

  public function messages()
  {
    return [
      'keterangan.required' => 'Keterangan harus diisi',
      'harga.required' => 'Harga harus diisi',
      'harga.numeric' => 'Harga harus berupa angka',
      'jenis_kendaraan.required' => 'Jenis kendaraan harus diisi',
      'thumbnail.required' => 'Thumbnail harus diisi',
      'thumbnail.image' => 'Thumbnail harus berupa gambar',
      'thumbnail.mimes' => 'Thumbnail harus berupa gambar dengan format jpeg, png, atau jpg',
      'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB',
    ];
  }
}
