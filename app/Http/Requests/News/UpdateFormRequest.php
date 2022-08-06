<?php

namespace App\Http\Requests\News;

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
            'new_title' => 'required|between:3,255',
            'new_description' => 'required|min:20',
            'new_content' => 'required|min:20',
            'new_active' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'new_title.required' => 'Vui lòng nhập Tiêu đề Tin tức',
            'new_title.between' => 'Tiêu đề Tin tức phải từ 3 đến 255 kí tự',

            'new_description.required' => 'Vui lòng nhập Mô tả Tin tức',
            'new_description.min' => 'Mô tả Tin tức phải ít nhất 20 kí tự',

            'new_content.required' => 'Vui lòng nhập Nội dung Tin tức',
            'new_content.min' => 'Nội dung Tin tức phải ít nhất 20 kí tự',

            'new_active.required' => 'Vui lòng chọn Trạng thái Tin tức'
        ];
    }
}