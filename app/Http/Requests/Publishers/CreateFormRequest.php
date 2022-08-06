<?php

namespace App\Http\Requests\Publishers;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'publisher_name' => 'required|between:3,255',
            'publisher_description' => 'required|min:10',
            'publisher_active' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'publisher_name.required' => 'Vui lòng nhập tên Nhà xuất bản',
            'publisher_name.between' => 'Tên Nhà xuất bản phải từ 3 đến 255 kí tự',

            'publisher_description.required' => 'Vui lòng nhập mô tả Nhà xuất bản',
            'publisher_description.min' => 'Mô tả Nhà xuất bản phải ít nhất 10 kí tự',

            'publisher_active.required' => 'Vui lòng chọn trạng thái Nhà xuất bản'
        ];
    }
}
