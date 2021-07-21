<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest
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
            'img.size' => 'Изображение не должно превышать 2 Мб'
        ];
    }
}
