<?php

namespace Equivalencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'mypassword' => 'required|min:6|max:18',
            'password' => 'required|confirmed|min:6|max:18|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
        ];
    }
    public function messages()
    {
        return [
            'mypassword.required' => 'El campo es requerido',
            'mypassword.min' => 'El mínimo permitido son 6 caracteres',
            'mypassword.max' => 'El máximo permitido son 18 caracteres',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseña no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
            'password.regex' => 'La contraseña tiene que tener letras y caracters especiales',
        ];
    }
}
