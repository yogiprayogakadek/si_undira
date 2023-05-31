<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KunjunganRequest extends FormRequest
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
            'tanggal_kunjungan' => 'required|date',
            'ringkasan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute hanya mengandung angka',
        ];
    }

    public function attributes()
    {
        return [
            'tanggal_kunjungan' => 'Tanggal kunjungan',
            'ringkasan' => 'Ringkasan kondisi pasien',
        ];
    }
}
