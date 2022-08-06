<?php

namespace App\Http\Requests\Books;

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
            'book_name' => 'required|between:3,255',

            'book_description' => 'required|min:20',

            'book_format' => 'required',
            'book_pages' => 'required',
            'book_weight' => 'required',
            'book_publishing_year' => 'required',

            'book_price' => 'required|integer|not_in:0',
            'book_price_sale' => 'required|integer|not_in:0',

            'menu_id' => 'required',
            'publisher_id' => 'required',
            
            'book_active' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'book_name.required' => 'Vui lòng nhập Tên Sách',
            'book_name.between' => 'Tên Sách phải từ 3 đến 255 kí tự',

            'book_description.required' => 'Vui lòng nhập Tên Sách',
            'book_description.min' => 'Mô tả Sách phải ít nhất 20 kí tự',

            'book_format.required' => 'Vui lòng nhập Khổ sách',
            'book_pages.required' => 'Vui lòng nhập Số trang sách',
            'book_weight.required' => 'Vui lòng nhập Trọng lượng của Sách',
            'book_publishing_year.required' => 'Vui lòng nhập Năm xuất bản của Sách',

            'book_price.required' => 'Vui lòng nhập Giá gốc của Sách',
            'book_price_sale.required' => 'Vui lòng nhập Giá giảm của Sách',
            'book_price.not_in' => 'Vui lòng nhập Giá dương',
            'book_price_sale.not_in' => 'Vui lòng nhập Giá dương',

            'menu_id.required' => 'Vui lòng chọn Danh mục Sách',
            'publisher_id.required' => 'Vui lòng chọn Nhà xuất bản Sách',

            'book_active.required' => 'Vui lòng chọn Trạng thái Sách'
        ];
    }
}
