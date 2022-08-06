<?php

namespace App\Http\Requests\Admin;

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
            'admin_email' => 'required',
            'admin_password' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'admin_email.required' => 'Vui lòng nhập Email',
            'admin_password.required' => 'Vui lòng nhập Mật khẩu'
        ];
    }
}
