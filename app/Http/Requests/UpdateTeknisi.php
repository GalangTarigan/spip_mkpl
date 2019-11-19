<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeknisi extends FormRequest
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
            'email'=>'email|unique:users|nullable',
            'alamat'=>'max:50|nullable',
            'no_telepon'=>'max:50|nullable'
        ];
    }

    public function messages(){
        return [
            'email.email'=>'Format email salah ',            
            'email.unique'=>'Email yang ingin didaftarkan sudah tersedia',
        
            'alamat.max'=>'Alamat maksimal 50 karakter',
            'no_telepon.max'=>'no_telepon maksimal 50 karakter',

        ];
    }
}
