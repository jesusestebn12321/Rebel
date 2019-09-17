<?php

namespace Equivalencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatterRequests extends FormRequest
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
            'slug' => 'required|unique:matters,slug',
            'matter' => 'required|string|min:1|max:150',
            'version' => 'required|string|min:1|max:150',
            'career_id' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'slug.required' => 'El campo es requerido',
            'slug.unique' => 'El campo esta duplicado',
            'career_id.required' => 'El campo es requerido',
            
            'matters.required' => 'El campo es requerido',
            'matters.string' => 'El campo es de texto',
            'matters.min' => 'El mínimo permitido son 1 caracteres',
            'matters.max' => 'El máximo permitido son 150 caracteres',

            'version.required' => 'El campo es requerido',
            'version.string' => 'El campo es de texto',
            'version.min' => 'El mínimo permitido son 1 caracteres',
            'version.max' => 'El máximo permitido son 150 caracteres',
        ];
    }
}
