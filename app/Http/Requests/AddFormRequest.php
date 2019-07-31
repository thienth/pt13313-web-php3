<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class AddFormRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('posts'),
            ],
            'image' => 'required|file|mimes:jpeg,png',
            'publish_date' => 'required|date|after:'.Carbon::now()->subDay()->format('Y-m-d')
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Vui lòng điền dữ liệu cho tiêu đề',
            'title.unique' => 'Tiêu đề đã tồn tại, vui lòng chọn tiêu đề khác'
        ];
    }





}
