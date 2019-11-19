<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaporanBerkalaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subjek' => 'required|max:50',
            'permasalahanKeluhan' => 'required|max:500',
            'solusi' => 'required|max:500'
        ];
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'subjek.required' => 'Kolom subjek tidak boleh kosong',
            'subjek.max' => 'Kolom subjek maksimal terdiri dari 50 karakter',
            'permasalahanKeluhan.required' => 'Kolom permasalahan / keluhan tidak boleh kosong',
            'permasalahanKeluhan.max' => 'Kolom permasalahan / keluhan maksimal terdiri dari 500 karakter',
            'solusi.required' => 'Kolom solusi tidak boleh kosong',
            'solusi.max' => 'Kolom solusi maksimal terdiri dari 500 karakter',
        ];
    }
}
