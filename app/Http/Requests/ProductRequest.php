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
            'price' => 'required|max:11',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png',
            'phone_number' => 'required|min:17|max:17',
            'location' => 'required'
        ];
    }

    public function messages(){
       return [
           'name.required' => 'Поле имя является обязательным',
           'price.required' => 'Поле цена является обязательным',
           'price.max' => 'Слишком большая цена',
           'description.required' => 'Поле описание товара является обязательным',
           'image.required' => 'Добавление фото является обязательным',
           'image.image' => 'В поле фото  должно быть изображение',
           'image.mimes' => 'Не поддерживаемый формат файла изображения',
           'phone_number.required' => 'Поле номер телефона является обязательным',
           'phone_number.max' => 'Поле номер телефона должен содержать 12 символов (+7 (9xx) xxx-xxxx)',
           'phone_number.min' => 'Поле номер телефона должен содержать 12 символов (+7 (9xx) xxx-xxxx)',
           'location.required' => 'Поле местоположение является обязательным'
       ];
    }
}
