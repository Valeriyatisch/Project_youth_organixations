<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'header' => 'required|min:5',
            'text' => 'required|min:100',
            'img' => 'required|image|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'header.required' => 'Поле заголовок является обязательным',
            'header.min' => 'Поле заголовок должно быть не менее 5 символов',
            'text.required' => 'Поле текст является обязательным',
            'text.min' => 'Поле текст должно быть не менее 100 символов',
            'img.required' => 'Поле изображение является обязательным',
            'img.image' => 'Изображение недопустимого формата',
            'img.max' => 'Изображение не должно превышать 2 Мб'
        ];
    }
}
