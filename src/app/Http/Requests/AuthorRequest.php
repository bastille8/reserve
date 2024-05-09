<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'days' => 'required',
            'times' => 'required',
            'numbers' => 'required',
            'shop' => 'required',
            'area' => 'required',
            'genre' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'days.required' => '日付を指定してください',
            'times.required' => '時間を入力してください',
            'numbers.required' => '人数を入力してください',
            'shop.required' => '店舗名を入力してください',
            'area.required' => '地域を指定してください',
            'genre.required' => 'ジャンルを入力してください',
        ];
    }
}
