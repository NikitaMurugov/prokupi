<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    public function rules(){
        return [
            'name' => 'required',
            's_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'location' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Изменение поля Имя является обязательным',
            's_name.required' => 'Изменение поля Фамилия является обязательным',
            'email.required' => 'Изменение поля Email является обязательным',
            'email.email' => 'Поле Email должно сожержать @',
            'phone_number.required' => 'Изменение поля Номер телефона является обязательным',
            'location.required' => 'Изменение поля Адрес является обязательным',
        ];
    }
}
