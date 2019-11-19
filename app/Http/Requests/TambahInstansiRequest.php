<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidTglInstalasi as ValidTgl;
use Illuminate\Validation\Rule;

class TambahInstansiRequest extends FormRequest
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

        $rules['namaInstansi'] = 'bail|required|max:50|unique:instansi,nama_instansi';
        $rules['jenisInstansi'] = 'bail|required|exists:kategori,id';
        $rules['alamatInstansi'] = 'bail|required|max:50';
        $rules['provinsi'] = 'bail|required|exists:provinces,id';
        $rules['kota'] = 'bail|required|exists:regencies,id';
        $rules['emailInstansi'] = 'bail|nullable|email|unique:instansi,email';
        $rules['noTeleponInstansi'] = 'bail|nullable|numeric|digits_between:10,15';

        $counter = count($this->namaPic) - 1;
        foreach (range(0, $counter) as $index) {
            $rules['namaPic.' . $index] = 'bail|required|max:50';
            $rules['nomorTelepon.' . $index] = 'bail|required|numeric|digits_between:10,15';
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
            'namaInstansi.required' => 'Kolom nama instansi tidak boleh kosong',
            'namaInstansi.max' => 'Kolom nama instansi maksimal terdiri dari 50 karakter',
            'namaInstansi.unique' => 'Nama instansi sudah tersedia di database',
            'jenisInstansi.required' => 'Jenis instansi harus dipilih',
            'jenisInstansi.exists' => 'Jenis instansi yang anda pilih tidak ada di database',
            'alamatInstansi.required' => 'Kolom alamat instansi tidak boleh kosong',
            'alamatInstansi.max' => 'Kolom alamat instansi maksimal terdiri dari 50 karakter',
            'provinsi.required' => 'Provinsi harus dipilih',
            'kota.required' => 'Kota harus dipilih',
            'namaPic.0.required' => 'Kolom nama pic 1 tidak boleh kosong',
            'namaPic.0.max' => 'Kolom nama pic 1 maksimal terdiri dari 50 karakter',
            'nomorTelepon.0.required' => 'Kolom nomor telepon 1 pic tidak boleh kosong',
            'nomorTelepon.0.numeric' => 'Inputan harus berupa nomor',
            'nomorTelepon.0.digits_between' => 'Nomor telepon pic 1 minimal terdiri dari 10 karakter & maksimal 15 karakter',
            'namaPic.1.required' => 'Kolom nama pic 2 tidak boleh kosong',
            'namaPic.1.max' => 'Kolom nama pic 2 maksimal terdiri dari 50 karakter',
            'nomorTelepon.1.required' => 'Kolom nomor telepon pic 2 tidak boleh kosong',
            'nomorTelepon.1.numeric' => 'Inputan harus berupa nomor',
            'nomorTelepon.1.digits_between' => 'Nomor telepon pic 2 minimal terdiri dari 10 karakter & maksimal 15 karakter',
            'daftarInstansi.required' => 'Kolom nama instansi harus dipilih',
            'daftarInstansi.exists' => 'Nama instansi yang anda pilih tidak ada di database',
            'emailInstansi.email' => 'Inputan harus berupa email',
            'emailInstansi.unique' => 'Email yang diinputkan harus unik',
            'noTeleponInstansi.numeric' => 'Inputan harus berupa nomor',
            'noTeleponInstansi.digits_between' => 'Nomor telepon instansi minimal terdiri dari 10 karakter & maksimal 15 karakter',
        ];
    }
}
