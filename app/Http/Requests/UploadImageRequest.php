<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
        $rules = [
            
        ];
        $counter = count($this->images);
        foreach(range(0, $counter) as $index) {
            $rules['images.' . $index] = 'bail|image|mimes:jpeg,bmp,png,JPG,jpg,JPEG|max:3072';
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
            'images.*.image' => 'File harus berupa gambar',
            'images.*.max' => 'Ukuran setiap foto maksimal 3MB',
            'images.*.mimes' => 'Format foto tidak didukung'
        ];
    }
}
