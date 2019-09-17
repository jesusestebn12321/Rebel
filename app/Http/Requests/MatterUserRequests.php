<?php

namespace Equivalencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatterUserRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return [
            'matter_id' => 'required',
            'user_id' => 'required',
        ];
    }
     public function messages()
    {
        return [
            
            'matter_id.required' => 'El campo es requerido',
            'user_id.required' => 'El campo es requerido',
            
        ];
    }
}
