<?php

namespace Equivalencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequests extends FormRequest
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
            'area' => 'required|string|min:1|max:150',
            'address_id' => 'required|numeric',
            'university_id' => 'required|numeric',
        ];
    }
     public function messages()
    {
        return [
            'address_id.required' => 'El campo es requerido',
            'university_id.required' => 'El campo es requerido',
            'area.required' => 'El campo es requerido',
            'area.string' => 'El campo es de texto',
            'area.min' => 'El mínimo permitido son 1 caracteres',
            'area.max' => 'El máximo permitido son 150 caracteres',
        ];
    }
}
