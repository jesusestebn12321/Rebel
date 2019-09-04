<?php

namespace Equivalencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversityCreateRequest extends FormRequest
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
            'university' => 'required|string|min:6|max:50',
            'address_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'university.required' => 'El campo es requerido',
            'university.string' => 'El campo es de texto',
            'university.min' => 'El mínimo permitido son 6 caracteres',
            'university.max' => 'El máximo permitido son 50 caracteres',
            'address_id.required' => 'El campo es requerido',
        ];
    }
}
