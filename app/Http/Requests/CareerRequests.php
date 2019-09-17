<?php

namespace Equivalencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequests extends FormRequest
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


    public function rules()
    {
        return [
            //'slug' => 'required|unique:areas,slug',
            'career' => 'required|string|min:1|max:150',
            'modalidad' => 'required|string|min:1|max:150',
            'area_id' => 'required|numeric',
        ];
    }
     public function messages()
    {
        return [
            'area_id.required' => 'El campo es requerido',
            'area.required' => 'El campo es requerido',
            'area.string' => 'El campo es de texto',
            'area.min' => 'El mínimo permitido son 1 caracteres',
            'area.max' => 'El máximo permitido son 150 caracteres',
            'modalidad.required' => 'El campo es requerido',
            'modalidad.string' => 'El campo es de texto',
            'modalidad.min' => 'El mínimo permitido son 1 caracteres',
            'modalidad.max' => 'El máximo permitido son 150 caracteres',
        ];
    }
}
