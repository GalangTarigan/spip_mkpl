<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidTglInstalasi as ValidTgl;
use Illuminate\Validation\Rule;

class LaporanInstalasiBaruRequest extends FormRequest
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

        $rules['daftarInstansi'] = 'bail|required|exists:instansi,id_instansi';
        $rules['waktuMulaiInstalasi'] = ['bail', 'required', 'date_format:d/m/Y H:i', new ValidTgl];
        if($this->input('namaPic') != "")  $rules['nomorTelepon'] = 'bail|required|numeric|digits_between:10,15';
        else if ($this->input('nomorTelepon') != "") $rules['namaPic'] = 'bail|required|max:50';
        else {
            $rules['namaPic'] = 'nullable';
            $rules['nomorTelepon'] = 'nullable';
        }

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
            'waktuMulaiInstalasi.required' => 'Tanggal instalasi tidak boleh kosong',
            'waktuMulaiInstalasi.date_format' => 'Kolom waktu waktu mulai instalasi harus berisi tanggal dan waktu',
            'daftarInstansi.required' => 'Kolom nama instansi harus dipilih',
            'daftarInstansi.exists' => 'Nama instansi yang anda pilih tidak ada di database',
            'namaPic.required' => 'Kolom nama pic tidak boleh kosong',
            'namaPic.max' => 'Kolom nama pic maksimal terdiri dari 50 karakter',
            'nomorTelepon.required' => 'Kolom nomor telepon pic tidak boleh kosong',
            'nomorTelepon.numeric' => 'Inputan harus berupa nomor',
            'nomorTelepon.digits_between' => 'Nomor telepon pic minimal terdiri dari 10 karakter & maksimal 15 karakter',
        ];
    }
}
