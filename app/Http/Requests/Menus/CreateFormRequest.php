<?php

namespace App\Http\Requests\Menus;

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
            'menu_name' => 'required|between:3,255',
            'menu_parent_id' => 'required',
            'menu_description' => 'required|min:10',
            'menu_active' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'menu_name.required' => 'Vui lòng nhập tên Danh Mục',
            'menu_name.between' => 'Tên Danh Mục phải từ 3 đến 255 kí tự',

            'menu_parent_id.required' => 'Vui lòng chọn Danh mục cha',

            'menu_description.required' => 'Vui lòng nhập mô tả Danh mục',
            'menu_description.min' => 'Mô tả Danh mục phải ít nhất 10 kí tự',

            'menu_active.required' => 'Vui lòng chọn trạng thái Danh mục'
        ];
    }
}
