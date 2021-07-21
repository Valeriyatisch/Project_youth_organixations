<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'shortname' => 'required|min:5',
            'fullname' => 'required|min:5',
            'district' => 'required',
            'address' => 'required|min:5',
            'phone' => 'required|regex:/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/',
            'email' => 'required|email',
            'vkgroup' => 'nullable|url',
            'img' => 'nullable|image|size:2048'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Поле полное название является обязательным',
            'fullname.min' => 'Поле полное название должно быть не менее 5 символов',
            'shortname.required' => 'Поле сокращенное название является обязательным',
            'shortname.min' => 'Поле сокращенное название должно быть не менее 5 символов',
            'district.required' => 'Поле район является обязательным',
            'address.required' => 'Поле адрес является обязательным',
            'address.min' => 'Поле адрес должно быть не менее 5 символов',
            'phone.required' => 'Поле телефон является обязательным',
            'phone.regex' => 'Поле телефон неверного формата!',
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Поле email неверного формата!',
            'vkgroup.url' => 'Поле ссылка на группу вконтакте имеет неверный формат',
            'img.image' => 'Поле изображение имеет неверный формат',
            'img.size' => 'Изображение не должно превышать 2 Мб'

        ];
    }
}
