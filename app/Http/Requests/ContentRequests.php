<?php

namespace Equivalencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequests extends FormRequest
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
            //'slug' => 'required|unique:areas,slug',
            'title' => 'required|string|min:1|max:150',
            'content' => 'required|string|min:1|max:250',
        ];
    }
     public function messages()
    {
        return [
            'title.required' => 'El campo es requerido',
            'title.string' => 'El campo es de texto',
            'title.min' => 'El mínimo permitido son 1 caracteres',
            'title.max' => 'El máximo permitido son 150 caracteres',
            'content.required' => 'El campo es requerido',
            'content.string' => 'El campo es de texto',
            'content.min' => 'El mínimo permitido son 1 caracteres',
            'content.max' => 'El máximo permitido son 250 caracteres',
        ];
    }
}
