<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'products.*.produced' => 'required|numeric',
            'products.*.dispatched' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'products.*.produced.required' => 'El elemento es requerido',
            'products.*.produced.numeric' => 'Debe ser un número',
            'products.*.dispatched.required' => 'El elemento es requerido',
            'products.*.dispatched.numeric' => 'Debe ser un número',
        ];
    }
}
