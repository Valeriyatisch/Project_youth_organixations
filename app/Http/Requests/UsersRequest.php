<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'surname' => 'required',
            'email' => 'required|email|unique:App\Models\Users,email',
            'pwd' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/',
            'org' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя является обязательным',
            'surname.required' => 'Поле фамилия является обязательным',
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Поле email неверного формата!',
            'email.unique' => 'Email уже существует',
            'pwd.required' => 'Поле пароль  является обязательным',
            'pwd.regex' => 'Поле пароль должно быть не менее 8 символов и содержать цифры, буквы латинского алфавита и специальные символы',
            'org.required' => 'Поле организация является обязательным'
        ];
    }
}
