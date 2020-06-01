<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Изменение поля Имя является обязательным',
            'category_id.required' => 'Изменение Категории товара является обязательным',
            'description.required' => 'Изменение Описания является обязательным',
            'phone_number.required' => 'Изменение Номера телефона является обязательным',
            'price.required' => 'Изменение Цены является обязательным',
        ];
    }
}

