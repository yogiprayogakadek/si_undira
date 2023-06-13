<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nik' => 'required|regex:/^[0-9]{16}$/|size:16',
            'rm' => 'required',
            'kecamatan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute hanya mengandung angka',
            'min' => 'Panjang minimal :attribute harus :min karakter',
            'max' => 'Panjang maksimal :attribute harus :max karakter',
            'size' => 'Panjang :attribute harus :size karakter',
            'regex' => ':attribute harus mengandung angka',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'tanggal_lahir' => 'Tanggal lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'nik' => 'NIK',
            'rm' => 'Nomor rekam medis',
            'kecamatan' => 'Kecamatan'
        ];
    }
}
