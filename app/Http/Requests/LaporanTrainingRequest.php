<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidTglMulaiTraining as validTglMulai;
use App\Rules\ValidTglSelesaiTraining as validTglSelesai;
use App\Rules\ValidStatusProyekRequest as validStatus;

class LaporanTrainingRequest extends FormRequest
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
            'waktuMulaiTraining' => ['bail', 'required', 'date_format:d/m/Y H:i', new validTglMulai],
            'waktuSelesaiTraining' => ['bail', 'required', 'date_format:d/m/Y H:i',new validTglSelesai($this->input('waktuMulaiTraining'))],
            'informasiTambahan' => 'bail|required|max:500'

        ];
    }/**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'waktuMulaiTraining.required' => 'Kolom waktu mulai training tidak boleh kosong',
            'waktuMulaiTraining.date_format' => 'Kolom waktu waktu mulai training harus berisi tanggal dan waktu',
            'waktuSelesaiTraining.required' => 'Kolom waktu selesai training tidak boleh kosong',
            'waktuSelesaiTraining.date_format' => 'Kolom waktu waktu selesai training harus berisi tanggal dan waktu',
            'informasiTambahan.required' => 'Kolom informasi tambahan tidak boleh kosong',
            'informasiTambahan.max' => 'Kolom informasi tambahan maksimal terdiri dari 500 karakter'
        ];
    }
}
