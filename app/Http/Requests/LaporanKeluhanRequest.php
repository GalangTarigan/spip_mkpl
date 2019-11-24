<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidTglLapor;
use App\Rules\ValidTglSelesaiPenanganan as ValidTSP;
use App\Rules\ValidInstansi;
use App\Rules\ValidPelapor;
use App\Rules\ValidSubjekKeluhan;
class LaporanKeluhanRequest extends FormRequest
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
        $rules =  [
            'namaInstansi' => ['bail', 'required', new ValidInstansi],
            'namaPelapor' => ['bail', 'required', new ValidPelapor],
            'waktuLapor' => ['bail', 'required', 'date_format:d/m/Y H:i', new ValidTglLapor($this->input('namaInstansi'))],
            'waktuSelesaiPenanganan' => ['bail','required', 'date_format:d/m/Y H:i', new ValidTSP($this->input('waktuLapor'))],
            'permasalahanKeluhan' => 'bail|required|max:500',
            'solusiPermasalahanKeluhan' => 'bail|required|max:500',
            'subjekKeluhan' => ['bail', 'required', 'array', new ValidSubjekKeluhan]
        ];
        return $rules;
    }
      /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'namaInstansi.required' => 'Nama instansi tidak boleh kosong',
            'namaPelapor.required' => 'Nama pelapor tidak boleh kosong',
            'waktuLapor.required' => 'Kolom waktu lapor tidak boleh kosong',
            'waktuLapor.date_format' => 'Kolom waktu lapor harus berisi tanggal dan waktu',
            'waktuSelesaiPenanganan.required' => 'Kolom waktu selesai penanganan tidak boleh kosong',
            'waktuSelesaiPenanganan.date_format' => 'Kolom waktu selesai penanganan harus berisi tanggal dan waktu',
            'permasalahanKeluhan.required' => 'Kolom permasalahan keluhan tidak boleh kosong',
            'solusiPermasalahanKeluhan.required' => 'Kolom solusi permasalahan tidak boleh kosong',
            'subjekKeluhan.required' => 'Kolom subjek keluhan tidak boleh kosong'
        ];
    }
}
