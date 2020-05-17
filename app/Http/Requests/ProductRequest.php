<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'phone_number' => 'required|min:12|max:12',
            'location' => 'required'
        ];
    }

    public function messages(){
       return [
           'name.required' => 'Поле имя является обязательным',
           'price.required' => 'Поле цена является обязательным',
           'description.required' => 'Поле описание товара является обязательным',
           'phone_number.required' => 'Поле номер телефона является обязательным',
           'phone_number.max' => 'Поле номер телефона должен содержать 12 символов (+79000000000)',
           'phone_number.min' => 'Поле номер телефона должен содержать 12 символов (+79000000000)',
           'location.required' => 'Поле местоположение является обязательным'
       ];
    }
}
