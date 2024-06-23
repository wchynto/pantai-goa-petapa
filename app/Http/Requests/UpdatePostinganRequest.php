<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostinganRequest extends FormRequest
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
      'judul' => 'required',
      'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      'body' => 'required',
    ];
  }

  public function messages(): array
  {
    return [
      'judul.required' => 'Judul harus diisi!',
      'thumbnail.image' => 'Thumbnail harus berupa gambar',
      'thumbnail.mimes' => 'Thumbnail harus berupa gambar dengan format jpeg, png, atau jpg',
      'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB',
      'body.required' => 'Body harus diisi',
    ];
  }
}
