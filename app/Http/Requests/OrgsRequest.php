<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrgsRequest extends FormRequest
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
            'org' => 'required',
            'img' => 'nullable|image|max:2048',
            'vkgroup' => 'nullable|url'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Поле название является обязательным',
            'fullname.min' => 'Поле название должно быть не менее 5 символов',
            'shortname.required' => 'Поле название является обязательным',
            'shortname.min' => 'Поле название должно быть не менее 5 символов',
            'district.required' => 'Поле район является обязательным',
            'address.required' => 'Поле адрес является обязательным',
            'address.min' => 'Поле адрес должно быть не менее 5 символов',
            'phone.required' => 'Поле телефон является обязательным',
            'phone.regex' => 'Поле телефон неверного формата!',
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Поле email неверного формата!',
            'org.required' => 'Поле тип организации является обязательным',
            'vkgroup.url' => 'Поле ссылка на группу вконтакте имеет неверный формат',
            'img.image' => 'Изображение недопустимого формата',
            'img.max' => 'Изображение не должно превышать 2 Мб'
        ];
    }
}
