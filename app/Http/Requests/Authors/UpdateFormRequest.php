<?php

namespace App\Http\Requests\Authors;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'author_name' => 'required|between:3,255',

            'author_description' => 'bail|required|min:20'
        ];
    }

    public function messages() : array
    {
        return [
            'author_name.required' => 'Vui lòng nhập Tên tác giả',
            'author_name.between' => 'Tên tác giả phải từ 3 đến 255 kí tự',

            'author_description.required' => 'Vui lòng mô tả Tác giả',
            'author_description.min' => 'Mô tả Tác giả phải ít nhất 20 kí tự'
        ];
    }
}
