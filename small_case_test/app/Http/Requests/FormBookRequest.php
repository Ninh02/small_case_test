<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormBookRequest extends FormRequest
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
            'name'=>'required',
            'image'=>'required',
            'writerName'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required'=>'Trường tên không được để trống',
            'image.required'=>'Trường ảnh không được để trống',
            'writerName.required'=>'Trường tên tác giả không được để trống',
            'category_id.required'=>'Trường thể loại không được để trống',
            'price.required'=>'Trường giá không được để trống',
            'description.required'=>'Trường mô tả không được để trống',
        ];
        return $messages;
    }
}
